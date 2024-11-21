<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index () {
        $contact = Page::where("id",1)->select("contact_title","contact_heading","contact_content")->first();
        return view("front.contact",compact("contact"));
    }

    public function submit_contact (Request $request) {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|string",
        ]);

        $subject = "Contact form email";
        $message = "Visitor email information: <br>";
        $message .= "<br>Name: ".$request->name;
        $message .= "<br>Email: ".$request->email;
        $message .= "<br>Message: ".$request->message;

        $admin = Admin::find(1);

        \Mail::to($admin->email)->send(new Websitemail($subject, $message));

        return response()->json(["ok" => true, "message" => "Mail has been send successfully!"]);
    }
}
