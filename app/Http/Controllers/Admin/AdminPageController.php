<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function edit_about () {
        $about = Page::find(1);
        return view("admin.about_edit", compact("about"));
    }

    public function update_about (Request $request) {
        $request->validate([
            "about_heading" => "required|string",
            "about_content" => "required|string",
            "about_status" => "nullable|string|in:Yes",
        ]);

        $about = Page::find(1);

        $about->about_heading = $request->about_heading;
        $about->about_content = $request->about_content;
        $about->about_status = $request->about_status == "Yes" ? 1 : 0;

        $about->save();

        return redirect()->route("admin.page.about.edit")->with("status","About has been updated successfully!");
    }

    public function edit_terms () {
        $page = Page::find(1);
        return view("admin.terms_edit",compact("page"));
    }

    public function update_terms (Request $request) {
        $request->validate([
            "terms_heading" => "required|string",
            "terms_content" => "required|string",
            "terms_status" => "nullable|string|in:Yes",
        ]);

        $terms = Page::find(1);

        $terms->terms_heading = $request->terms_heading;
        $terms->terms_content = $request->terms_content;
        $terms->terms_status = $request->terms_status == "Yes" ? 1 : 0;

        $terms->update();

        return redirect()->route("admin.page.terms.edit")->with("status","Ters has been updated successfully!");
    }

    public function edit_policy () {
        $policy = Page::where("id",1)->select("policy_heading","policy_content","policy_status")->first();
        return view("admin.policy_edit",compact("policy"));
    }

    public function update_policy (Request $request) {
        $request->validate([
            "policy_heading" => "required|string",
            "policy_content" => "required|string",
            "policy_status" => "nullable|string|in:Yes",
        ]);

        $policy = Page::find(1);

        $policy->policy_heading = $request->policy_heading;
        $policy->policy_content = $request->policy_content;
        $policy->policy_status = $request->policy_status == "Yes" ? 1 : 0;

        $policy->update();

        return redirect()->route("admin.page.policy.edit")->with("status","Policy has been updated successfully!");
    }

    public function edit_contact () {
        $contact = Page::where("id",1)->select("contact_heading","contact_content","contact_status")->first();
        return view("admin.contact_edit",compact("contact"));
    }

    public function update_contact (Request $request) {
        $request->validate([
            "contact_heading" => "required|string",
            "contact_content" => "required|string",
            "contact_status" => "nullable|string|in:Yes",
        ]);

        $contact = Page::find(1);

        $contact->contact_heading = $request->contact_heading;
        $contact->contact_content = $request->contact_content;
        $contact->contact_status = $request->contact_status == "Yes" ? 1 : 0;

        $contact->update();

        return redirect()->route("admin.page.contact.edit")->with("status","Contact has been updated successfully!");
    }

    public function edit_photo () {
        $photo = Page::where("id",1)->select("photo_heading","photo_status")->first();
        return view("admin.photo2_edit",compact("photo"));
    }

    public function update_photo (Request $request) {
        $request->validate([
            "photo_heading" => "required|string",
            "photo_status" => "nullable|string|in:Yes",
        ]);

        $photo = Page::find(1);


        $photo->photo_heading = $request->photo_heading;
        $photo->photo_status = $request->photo_status == "Yes" ? 1 : 0;
        
        $photo->update();

        return redirect()->back()->with("status","Photo Galery has been updated successfully!");
    }

    public function edit_video () {
        $video = Page::where("id",1)->select("video_heading","video_status")->first();
        return view("admin.video2_edit",compact("video"));
    }

    public function update_video (Request $request) {
        $request->validate([
            "video_heading" => "required|string",
            "video_status" => "nullable|string|in:Yes",
        ]);

        $video = Page::find(1);    

        $video->video_heading = $request->video_heading;
        $video->video_status = $request->video_status == "Yes" ? 1 : 0;
        
        $video->save();
        
        return redirect()->back()->with("status","Video Galery has been updated successfully!");
    }

    public function edit_faq () {
        $faq = Page::where("id",1)->select("faq_heading","faq_status")->first();
        return view("admin.faq2_edit",compact("faq"));
    }

    public function update_faq (Request $request) {
        $request->validate([
            "faq_heading" => "required|string",
            "faq_status" => "nullable|string|in:Yes",
        ]);

        $faq = Page::find(1);       

        $faq->faq_heading = $request->faq_heading; 
        $faq->faq_status = $request->faq_status == "Yes" ? 1 : 0;

        $faq->update();

        return redirect()->back()->with("status","Faq has been updated successfully!");
    }

    public function edit_blog () {
        $blog = Page::where("id",1)->select("blog_heading","blog_status")->first();
        return view("admin.blog_edit",compact("blog"));
    }

    public function update_blog (Request $request) {
        $request->validate([
            "blog_heading" => "required|string",
            "blog_status" => "nullable|string|in:Yes",
        ]);

        $blog = Page::find(1);

        $blog->blog_heading = $request->blog_heading;
        $blog->blog_status = $request->blog_status == "Yes" ? 1 : 0;

        $blog->update();

        return redirect()->back()->with("status","Blog has been updated successfully!");
    }

    public function edit_cart () {
        $cart = Page::where("id",1)->select("cart_heading","cart_status")->first();
        return view("admin.cart2_edit",compact("cart"));
    }

    public function update_cart (Request $request) {
        $request->validate([
            "cart_heading" => "required|string",
            "cart_status" => "nullable|string|in:Yes",
        ]);

        $cart = Page::find(1);

        $cart->cart_heading = $request->cart_heading;
        $cart->cart_status = $request->cart_status == "Yes" ? 1 : 0;

        $cart->update();

        return redirect()->back()->with("status","Cart has been updated successfully!");
    }

    public function edit_checkout () {
        $checkout = Page::where("id",1)->select("checkout_heading","checkout_status")->first();
        return view("admin.checkout2_edit",compact("checkout"));
    }

    public function update_checkout (Request $request) {
        $request->validate([
            "checkout_heading" => "required|string",
            "checkout_status" => "nullable|string|in:Yes",
        ]);

        $checkout = Page::find(1);

        $checkout->checkout_heading = $request->checkout_heading;
        $checkout->checkout_status = $request->checkout_status == "Yes" ? 1 : 0;

        $checkout->update();
        
        return redirect()->back()->with("status","Checkout has been updated successfully!");
    }

    public function edit_payment () {
        $payment = Page::where("id",1)->select("payment_heading")->first();
        return view("admin.payment2_edit",compact("payment"));
    }

    public function update_payment (Request $request) {
        $request->validate([
            "payment_heading" => "required|string"
        ]);

        $payment = Page::find(1);
        $payment->payment_heading = $request->payment_heading;

        $payment->save();

        return redirect()->back()->with("status","Payment has been updated seccessfully!");
    }
}
