<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    public function login () {
        return view("customer.login");
    }

    public function submit_login (Request $request) {
        $request->validate([
            "email" => "required|email|exists:customers,email",
            "password" => "required|string|min:8",
        ]);

        $credential = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(Auth::guard("customer")->attempt($credential))
            return redirect()->route("customer.index");
        
        return redirect()->back()->with("Not exits user!");
    }

    public function signup () {
        return view("customer.signup");
    }

    public function submit_signup (Request $request) {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:customers",
            "password" => "required|string|min:8|max:13",
            "confirm_password" => "required|same:password",
        ]);

        $token = hash("sha256", time());
        $verification_link = url("customer/signup/verification/$token/$request->email");

        $customer = new Customer();
        
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->token = $token;
        $customer->status = 0;

        $customer->save();

        $subject = "Sign Up Verification";
        $message = "Please click on the link below to conrifm sign up process:<br>";
        $message .= "<a href='$verification_link'>$verification_link</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with("status","To complete the signup, please check your email adn click on the link!");
    }

    public function reset () {
        return view("customer.reset");
    }

    public function submit_reset () {

    }

    public function verification ($token, $email) {
        $customer = Customer::where("token",$token)->where("email",$email)->first();

        if($customer) {
            $customer->token = "";
            $customer->stauts = 1;

            $customer->save();

            return redirect()->route("customer.login")->with("status","Your account is verified successfully!");
        }

        return redirect()->route("customer.login")->with("error","The token has expired!");
    }

    public function logout () {
        Auth::guard("customer")->logout();

        return redirect()->route("customer.login");
    }
        
}
