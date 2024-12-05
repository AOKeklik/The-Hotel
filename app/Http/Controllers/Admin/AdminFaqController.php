<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index () {
        $faqs = Faq::orderBy("id","DESC")->get();
        return view("admin.faqs",compact("faqs"));
    }

    public function add_faq () {
        return view("admin.faq_add");
    }

    public function store_faq (Request $request) {
        $request->validate([
            "question" => "required|string",
            "answer" => "required|string",
        ]);

        $faq = new Faq();

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();

        return redirect()->route("admin.faqs")->with("status","Faq has been created successfully!");
    }
    
    public function edit_faq ($faq_id) {
        $faq = Faq::find($faq_id);

        if(!$faq)
            return redirect()->back()->with("error","Faq not found!");

        return view("admin.faq_edit", compact("faq"));
    }

    public function update_faq (Request $request) {
        $request->validate([
            // "faq_id" => "required|numeric|exists:faqs,id",
            "question" => "required|string",
            "answer" => "required|string",
        ]);

        $faq = Faq::find($request->faq_id);

        if(!$faq)
            return redirect()->route("admin.faqs")->with("error","Faq not found!");

        $faq->question = $request->question;        
        $faq->answer = $request->answer;            

        $faq->update();

        return redirect()->route("admin.faqs")->with("status","Faq has been updated successfully!");
    }

    public function delete_faq ($faq_id) {
        $faq = Faq::find($faq_id);

        if(!$faq)
            return redirect()->back()->with("error","Faq not found!");

        $faq->delete();

        return redirect()->back()->with("status","Faq has been deleted successfully!");
    }
}
