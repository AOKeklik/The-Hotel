<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminOrderController extends Controller
{
    public function index () {
        $orders = Order::orderBy("id","DESC")->get();
        return view("admin.orders",compact("orders"));
    }

    public function order ($order_id) {
        Carbon::setLocale("pl");
        $order = Order::find($order_id);

        if(!$order)
            return redirect()->back()->with("error","Order not found!");

        return view("admin.order",compact("order"));
    }

    public function delete_order ($order_id) {
        $order = Order::find($order_id);

        if(!$order)
            return redirect()->back()->with("error","Order not found!");

        if(!$order->orderDetails->isEmpty()) {
            foreach($order->orderDetails as $detail) {
                if($detail->room && !$detail->room->bookedRooms->isEmpty()) {
                    foreach($detail->room->bookedRooms as $booked) {
                        $booked->delete();
                    }
                }
            }
        }

        if(!$order->orderDetails->isEmpty()) 
            foreach($order->orderDetails as $detail) {
                $detail->delete();
            } 

        $order->delete();

        return redirect()->back()->with("status","Order has been deleted successfully!");
    }
}
