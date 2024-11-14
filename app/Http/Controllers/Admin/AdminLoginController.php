<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index () {
        return view("admin.login");
    }

    public function submit_login (Request $request)  {
        $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:8"]
        ]);

        $credential = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::guard("admin")->attempt($credential)) 
            return redirect()->route("admin.index");
        else
            return redirect()->route("admin.login")->with("error", "Not valid user or password!");
    }

    public function logout () {
        Auth::guard("admin")->logout();
        return redirect()->route("admin.login");
    }

    public function forget_password () {
        return view("admin.forget_password");
    }

    public function forget_submit (Request $request) {
        $request->validate([
            "email" => "required|email"
        ]);

        $admin = Admin::where("email", $request->email)->first();

        if (!$admin)
            return redirect()->back()->with("error", "Please enter a valid email address!");

        $token = hash("sha256", time());
        
        $admin->token = $token;
        $admin->update();

        $reset_link = url("admin/reset-password/".$token."/".$request->email);
        $subject = "Reset Password";
        $message = "Please click on the following link: <br>";
        $message .= "<a href='{$reset_link}'>Click Here</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route("admin.login")->with("status", "A reset link has been sent to your email address successfully!");
    }

    public function reset_password ($token, $email) {

        $admin = Admin::where("token", $token)->where("email", $email);

        if (!$admin)
            return redirect()->route("admin.login")->with("error", "In valid token!");

        return view("admin.reset_password");
    }

    public function reset_submit (Request $request) {
        $request->validate([
            "email" => "required|email",
            "token" => "required|string",
            "password_current" => "required|string|min:8",
            "password_new" => "required|string|min:8",
            "password_confirm" => "required|string|min:8|same:password_new",
        ]);

        $admin = Admin::where("email", $request->email)->where("token", $request->token)->first();

        if (!$admin || !Hash::check($request->password_current, $admin->password))
            return redirect()->back()->with("error", "Invalid email address or password!");

        $admin->password = Hash::make($request->password_new);
        $admin->update();

        return redirect()->route("admin.login")->with("status", "Password has been updated usccessfully!");
    }
}
