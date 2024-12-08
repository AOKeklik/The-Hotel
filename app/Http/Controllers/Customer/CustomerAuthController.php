<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function login () {
        return view("customer.auth_login");
    }

    public function submit_login (Request $request) {
        $request->validate([
            "email" => "required|email|exists:customers,email",
            "password" => "required|string|min:8",
        ]);

        $credential = [
            "email" => $request->email,
            "password" => $request->password,
            "status" => 1,
        ];

        if(Auth::guard("customer")->attempt($credential))
            return redirect()->route("customer.index");
        
        return redirect()->back()->with("error","Not exits user!");
    }

    public function signup () {
        return view("customer.auth_signup");
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
        $message .= "<a href='$verification_link'>Click!</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route("customer.login")->with("status","To complete the signup, please check your email and click on the link!");
    }

    public function verification_signup ($token, $email) {
        $customer = Customer::where("token",$token)->where("email",$email)->first();

        if($customer) {
            $customer->token = "";
            $customer->status = 1;

            $customer->update();

            return redirect()->route("customer.login")->with("status","Your account is verified successfully!");
        }

        return redirect()->route("customer.login")->with("error","The token has expired!");
    }

    public function forget () {
        return view("customer.auth_forget");
    }

    public function submit_forget (Request $request) {
        $request->validate([
            "email" => "required|email|exists:customers,email",
        ]);

        $customer = Customer::where("email",$request->email)->first();
        $token = hash("sha256",time());
        $link = url("customer/reset/$token/$request->email");

        $subject = "Reset Password";
        $message = "Please click on the following link: <br>";
        $message .= "<a href='$link'>Click</a>";

        if($customer) {
            if ($customer->status == 0)
                return redirect()->route("customer.login")->with("error", "Verification link has been send! Please check your email!");

            $customer->token = $token;
            $customer->status = 0;

            $customer->update();

            \Mail::to($request->email)->send(new Websitemail($subject,$message));

            return redirect()->route("customer.login")->with("status", "Please check your email and follow the steps there");
        }

        return redirect()->back()->with("error","Email address not found!");
    }

    public function reset ($token, $email) {
        $customer = Customer::where("token",$token)->where("email",$email)->first();

        if(!$customer)
            return redirect()->route("customer.forget")->with("error", "In valid token!");

        return view("customer.auth_reset", compact("token","email"));
    }

    public function submit_reset (Request $request) {
        $request->validate([
            "password" => "required|string",
            "confirm_password" => "required|string|same:password",
        ]);

        $customer = Customer::where("token",$request->token)->where("email",$request->email)->first();

        $customer->password = Hash::make($request->password);
        $customer->token = "";
        $customer->status = 1;

        $customer->update();

        return redirect()->route("customer.login")->with("status","Password is reset successfully!");
    }

    public function logout () {
        Auth::guard("customer")->logout();

        return redirect()->route("customer.login")->with("status","Logout successfully!");
    }
        
}
