<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login () {
        return view("admin.auth_login");
    }

    public function submit_login (Request $request)  {
        $request->validate([
            "email" => "required|email|exists:admins,email",
            "password" => ["required", "string", "min:8"]
        ]);

        $credential = [
            "email" => $request->email,
            "password" => $request->password,
            "status" => 1,
        ];

        if (Auth::guard("admin")->attempt($credential)) 
            return redirect()->route("admin.index");
        else
            return redirect()->back()->with("error", "Not valid user or password!");
    }

    public function logout () {
        Auth::guard("admin")->logout();
        return redirect()->route("admin.login");
    }

    public function forget () {
        return view("admin.auth_forget");
    }

    public function submit_forget (Request $request) {
        $request->validate([
            "email" => "required|email|exists:admins,email"
        ]);

        $admin = Admin::where("email", $request->email)->first();

        if (!$admin)
            return redirect()->back()->with("error", "Please enter a valid email address!");

        $token = hash("sha256", time());
    
        $admin->token = $token;
        $admin->status = 0;
        $admin->update();

        $reset_link = url("admin/reset/".$token."/".$request->email);
        $subject = "Reset Password";
        $message = "Please click on the following link: <br>";
        $message .= "<a href='{$reset_link}'>Click Here</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route("admin.login")->with("status", "Please check your email and follow the steps there!");
    }

    public function reset ($token, $email) {

        $admin = Admin::where("token", $token)->where("email", $email)->first();

        if (!$admin)
            return redirect()->route("admin.login")->with("error", "In valid token!");

        return view("admin.auth_reset",compact("token","email"));
    }

    public function submit_reset (Request $request) {
        $request->validate([
            "password_current" => "required|string|min:8",
            "password_new" => "required|string|min:8",
            "password_confirm" => "required|string|min:8|same:password_new",
        ]);

        $admin = Admin::where("email", $request->email)->where("token", $request->token)->first();

        if (!$admin || !Hash::check($request->password_current, $admin->password))
            return redirect()->back()->with("error", "Invalid email address or password!");

        $admin->password = Hash::make($request->password_new);
        $admin->token = "";
        $admin->status = 1;
        $admin->update();

        return redirect()->route("admin.login")->with("status", "Password has been updated usccessfully!");
    }
}
