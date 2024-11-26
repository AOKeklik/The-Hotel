<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubscriberController extends Controller
{
    public function submit_subscriber (Request $request) {
        $validator = \Validator::make($request->all(), [
            "email" => "required|email",
        ]);

        if(!$validator->passes())
            return response()->json(["ok" => false, "error_message" => $validator->errors()->toArray()]);

        $subscriper = Subscriber::where("email",$request->email)->first();
        $token = hash("sha256", time());

        $verification_link = url("subscriber/verify/$request->email/$token");
        
        if(!$subscriper) {
            $subscriper = new Subscriber();
            $subscriper->email = $request->email;
            $subscriper->status = 0;
        }

        $subscriper->token = $token;
        $subscriper->save();

        $subject = "Subscriber Verification";
        $message = "Please click on the link below to confirm subscription: <br>";
        $message .= "<a href='{$verification_link}' >";
        $message .= $verification_link;
        $message .= "</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return response()->json(["ok" => true, "message" => "Please check your email to confirm subscription!"]);
    }

    public function verify_subscriber ($email,$token) {
        $subscriper = Subscriber::where("email",$email)->where("token",$token)->first();

        if($subscriper) {
            $subscriper->token =  "";
            $subscriper->status = 1;
            $subscriper->save();

            return redirect()->route("front.index")->with("status","Your subscription is verified successfully!");
        }

        return redirect()->rotue("front.index")->with("error","Token not found!");

    }
}
