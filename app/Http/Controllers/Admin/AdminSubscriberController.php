<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function index () {
        $subscribers = Subscriber::orderBy("created_at","DESC")->paginate(12);
        return view("admin.subscribers",compact("subscribers"));
    }

    public function edit_subscriber ($subscriber_id) {
        $subscriber = Subscriber::find($subscriber_id);

        if(!$subscriber)
            return redirect()->route("admin.subscribers")->with("status","Subscriber not found!");

        return view("admin.subscriber_edit",compact("subscriber"));
    }

    public function email_subscriber () {
        return view("admin.subscriber_email");
    }

    public function update_subscriber (Request $request) {
        $request->validate([
            "subscriber_id" => "required|string|exists:subscribers,id",
            "email" => "required|email",
            "status" => "nullable|string|in:Yes",
        ]);

        $subscriber = Subscriber::find($request->subscriber_id);

        if(!$subscriber)
            return redirect()->route("admin.subscribers")->with("error","Subscriber not found!");

        $subscriber->email = $request->email;
        $subscriber->status = $request->status == "Yes" ? 1 : 0;

        $subscriber->update();

        return redirect()->route("admin.subscribers")->with("status","Subscriber has been updated successfully!");
    }

    public function delete_subscriber ($subscriber_id) {
        $subscriber = Subscriber::find($subscriber_id);

        if(!$subscriber)
            return redirect()->back()->with("error","Subscriber not found!");

        $subscriber->delete();

        return redirect()->back()->with("status","Subscriber has been deleted successfully!");
    }

    public function submit_subscriber (Request $request) {
        $request->validate([
            "subject" => "required|string",
            "message" => "required|string",
        ]);

        $subscribers = Subscriber::orderBy("id","DESC")->select("email")->get();

        foreach($subscribers as $subscriber) {
            \Mail::to($subscriber->email)->send(new Websitemail($request->subject,$request->message));
        }

        return redirect()->route("admin.subscribers")->with("status","Mail has send successfully!");
    }
}
