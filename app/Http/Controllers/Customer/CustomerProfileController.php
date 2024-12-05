<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class CustomerProfileController extends Controller
{
    public function edit_profile () {
        $profile = Customer::find(Auth::guard("customer")->user()->id);
        return view("customer.profile_edit",compact("profile"));
    }
    public function update_profile (Request $request) {
        $request->validate([
            "name" => "required|string",
            "phone" => "nullable|string",
            "country" => "nullable|string",
            "address" => "nullable|string",
            "state" => "nullable|string",
            "city" => "nullable|string",
            "zip" => "nullable|string",
            "photo" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
        ]);

        $customer = Customer::find(Auth::guard("customer")->user()->id);

        $customer->name = $request->name;
        
        if(
            $request->filled("password") &&
            !Hash::check($request->password,$customer->password)
        ) {
            $request->validate([
                "password" => "required|string|min:8",
                "confirm_password" => "required|string|same:password",
            ]);
            $customer->password = Hash::make($request->password);
        }

        $customer->phone = $request->phone;
        $customer->country = $request->country;
        $customer->address = $request->address;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->zip = $request->zip;

        if($request->hasFile("photo")) {

            if(!File::isDirectory(public_path("uploads/customer")))
                File::makeDirectory(public_path("uploads/customer"));

            if(File::isFile(public_path("uploads/customer/$customer->photo")))
                File::delete(public_path("uploads/customer/$customer->photo"));

            $image_name = uniqid().".".$request->file("photo")->getClientOriginalExtension();
            $image_path = $request->file("photo")->path();

            $image = Image::read($image_path);
            
            $image->cover(300,300,"top");
            $image->resize(300,300,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/customer/$image_name"));

            $customer->photo = $image_name;
        }

        $customer->update();

        return redirect()->back()->with("status","Customer has been updated successfully!");
    }
}
