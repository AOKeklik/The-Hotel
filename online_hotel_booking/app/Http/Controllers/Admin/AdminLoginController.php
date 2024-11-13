<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index () {
        return view("admin.login");
    }

    public function forget_password () {
        return view("admin.forget_password");
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
}
