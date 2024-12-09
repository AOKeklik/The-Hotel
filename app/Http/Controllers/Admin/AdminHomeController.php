<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index () {
        $total_rooms = Room::get()->count();
        $total_subscribers = Subscriber::get()->count();
        $completed_orders = Order::where("status","Completed")->count();
        $pending_orders = Order::where("status","Pending")->count();
        $active_customers = Customer::where("status",1)->count();
        $pending_customers = Customer::where("status",0)->count();
        return view("admin.home",compact(
            "total_rooms",
            "total_subscribers",
            "completed_orders",
            "pending_orders",
            "active_customers",
            "pending_customers"
        ));
    }
}
