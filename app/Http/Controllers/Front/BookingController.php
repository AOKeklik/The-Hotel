<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

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
            if ($item["cart_room_id"] == $item_id)
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

    // dd(Session()->get("billing"));
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
        $billing = Session()->get("billing");
        return view("front.booking_payment",compact("billing"));
    }
}
