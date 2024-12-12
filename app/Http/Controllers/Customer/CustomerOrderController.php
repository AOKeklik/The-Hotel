<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index () {
        $orders = Order::where("customer_id",Auth()->guard("customer")->user()->id)->orderBy("id","DESC")->get();
        return view("customer.orders",compact("orders"));
    }

    public function order ($order_id) {
        Carbon::setLocale('pl');
        $order = Order::find($order_id);

        if(!$order)
            return redirect()->route("front.index")->with("error","Your cart is empty. Please add items to proceed.");

        return view("customer.order",compact("order"));
    }
}
