<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index () {
        $customers = Customer::orderBy("id","DESC")->get();
        return view("admin.customers",compact("customers"));
    }

    public function edit_customer () {
        return view("admin.customer_edit");
    }

    public function update_status_customer ($customer_id) {
        $customer = Customer::find($customer_id);
        
        $customer->status = $customer->status == 1 ? 0 : 1;
        $customer->update();

        return redirect()->back()->with("status","Customer status has been updated successfully!");
    }
}
