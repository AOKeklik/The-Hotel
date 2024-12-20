<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    public function index () {
        $completed_orders = Order::where("customer_id",Auth()->guard("customer")->user()->id)->where("status","Completed")->count();
        $pending_orders = Order::where("customer_id",Auth()->guard("customer")->user()->id)->where("status","Pending")->count();
        return view("customer.home",compact("completed_orders","pending_orders"));
    }
}
