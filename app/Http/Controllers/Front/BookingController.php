<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use Illuminate\Http\Request;
Use Stripe;


class BookingController extends Controller
{
    public function cart () {
        // print_r(Session()->get("cart"));
        return view("front.booking_cart");
    }

    public function submit_cart (Request $request) {
        $request->validate([
            "room_id" => "required|numeric|exists:rooms,id",
            "checkin_checkout" => "required|string",
            "adult" => "required|numeric|min:0|max:30",
            "children" => "nullable|numeric|min:0|max:30",
        ]);

        $room = Room::find($request->room_id);

        $checkin = explode(" - ",$request->checkin_checkout)[0];
        $checkout = explode(" - ",$request->checkin_checkout)[1];

        $start = \DateTime::createFromFormat("d/m/Y",$checkin);
        $end = \DateTime::createFromFormat("d/m/Y",$checkout);
        $difference = $start->diff($end)->days;

        Session()->push("cart", (object) [
            "cart_room_id" => $request->room_id,
            "cart_room_photo" => $room->featured_photo,
            "cart_room_name" => $room->name,
            "cart_room_price" => $room->price,
            "cart_checkin" => $checkin,
            "cart_checkout" => $checkout,
            "cart_adult" => $request->adult,
            "cart_children" => $request->children ?? 0,
            "cart_subtotal" => $difference*$room->price,
        ]);        

        return redirect()->back()->with("status","Room has been added to the cart successfully!");
    }

    public function delete_item_cart ($item_id) {
        
        $cart = Session()->get("cart");

        foreach ($cart as $key => $item) 
            if ($item->cart_room_id == $item_id)
                unset($cart[$key]);

        if(empty($cart))
            Session()->forget("cart");
        else
            Session()->put("cart", $cart);

        return redirect()->back()->with("status","Cart item has been deleted successfully!");
    }

    public function checkout () {
        
        if(!Session()->has("cart"))
            return redirect()->back()->with("error","Cart is empty!");
    
        if(!Auth()->guard("customer")->check())
            return redirect()->route("customer.login")->with("error","Please log in to continue.");

        $customer = Session()->has("billing") 
            ? Session()->get("billing")
            : Auth()->guard("customer")->user();

        return view("front.booking_checkout",compact("customer"));
    }

    public function submit_checkout (Request $request) {

        if(!Auth()->guard("customer")->check())
            return redirect()->route("customer.login")->with("error","Please log in to continue.");

        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "country" => "required|string",
            "address" => "required|string",
            "state" => "required|string",
            "city" => "required|string",
            "zip" => "required|string",
        ]);

        Session()->put("billing", (object) [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "country" => $request->country,
            "address" => $request->address,
            "state" => $request->state,
            "city" => $request->city,
            "zip" => $request->zip,
        ]);

        return redirect()->route("front.payment");
    }

    public function payment () {
        // dd(env("STRIPE_SECRET_KEY"));
        if(!Auth()->guard("customer")->check())
            return redirect()->route("customer.login")->with("error","Please log in to continue.");

        $billing = Session()->get("billing");
        return view("front.booking_payment",compact("billing"));
    }

    public function paypal (Request $request) {
    }

    public function stripe (Request $request) {

        $cents = $request->cents*100;
        $stripe_secret_key = env("STRIPE_SECRET_KEY");

        Stripe\Stripe::setApiKey($stripe_secret_key);
        $response = Stripe\Charge::create ([
            "amount" => $cents,
            "currency" => "PLN",
            "source" => $request->stripeToken,
            "description" => env('APP_NAME')
        ]);

        $responseJson = $response->jsonSerialize();
        $transaction_id = $responseJson['balance_transaction'];
        $last_4 = $responseJson['payment_method_details']['card']['last4'];

        // $transaction_id = "transaction_id";
        // $last_4 = "last_4";

        $order = new Order();
        $order->customer_id = Auth()->guard("customer")->user()->id;
        $order->order_no = uniqid();
        $order->transaction_id = $transaction_id;
        $order->payment_method = "Stripe";
        $order->card_last_digit = $last_4;
        $order->paid_amount = $request->cents;
        $order->booking_date = date("d/m/Y");
        $order->status = "Completed";

        $order->save();
        $order_id = $order->id;

        foreach(Session()->get("cart") as $cart) {
            $orderDetail = new OrderDetail();

            $orderDetail->order_id = $order_id;
            $orderDetail->room_id = $cart->cart_room_id;
            $orderDetail->checkin_date = $cart->cart_checkin;
            $orderDetail->checkout_date = $cart->cart_checkout;
            $orderDetail->adult = $cart->cart_adult;
            $orderDetail->children = $cart->cart_children;
            $orderDetail->subtotal = $cart->cart_subtotal;

            $orderDetail->save();
        }

        $subject = "New Order";
        $message = "You have made an order for hotel booking. The booking information is given below: <br>";
        $message .= "<br><strong>Order No:</strong> ".$order_id;
        $message .= "<br><strong>Transaction Id:</strong> ".$transaction_id;
        $message .= "<br><strong>Payment Method:</strong> Stripe";
        $message .= "<br><strong>Paid Amount:</strong> ".$request->cents;
        $message .= "<br><strong>Booking Date:</strong> ".date("d/m/Y")."<br><hr>";

        foreach(Session()->get("cart") as $cart) {
            $message .= "<br><strong>Room Name:</strong> ".$cart->cart_room_name;
            $message .= "<br><strong>Price Per Night:</strong> ".$cart->cart_room_price;
            $message .= "<br><strong>Checkin Date:</strong> ".$cart->cart_checkin;
            $message .= "<br><strong>Checkout Date:</strong> ".$cart->cart_checkout;
            $message .= "<br><strong>Adult:</strong> ".$cart->cart_adult;
            $message .= "<br><strong>Children:</strong> ".$cart->cart_children;
            $message .= "<br><strong>Price Subtotal:</strong> ".$cart->cart_subtotal."<br><br>";
        }

        \Mail::to(Auth()->guard("customer")->user()->email)->send(new Websitemail($subject,$message));

        Session()->forget("cart");
        Session()->forget("billing");

        return redirect()->route("front.index")->with("status","Payment is successful!");
    }
}
