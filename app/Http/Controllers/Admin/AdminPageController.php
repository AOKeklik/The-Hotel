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
            "about_title" => "nullable|string",
            "about_heading" => "required|string",
            "about_content" => "required|string",
            "about_status" => "nullable|string|in:Yes",
        ]);

        $about = Page::find(1);

        if(!empty($request->about_title))
            $about->about_title = $request->about_title;

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
            "terms_title" => "nullable|string",
            "terms_heading" => "required|string",
            "terms_content" => "required|string",
            "terms_status" => "nullable|string|in:Yes",
        ]);

        $terms = Page::find(1);

        if(!empty($request->terms_title))
            $terms->terms_title = $request->terms_title;

        $terms->terms_heading = $request->terms_heading;
        $terms->terms_content = $request->terms_content;
        $terms->terms_status = $request->terms_status == "Yes" ? 1 : 0;

        $terms->update();

        return redirect()->route("admin.page.terms.edit")->with("status","Ters has been updated successfully!");
    }

    public function edit_policy () {
        $policy = Page::where("id",1)->select("policy_title","policy_heading","policy_content","policy_status")->first();
        return view("admin.policy_edit",compact("policy"));
    }

    public function update_policy (Request $request) {
        $request->validate([
            "policy_title" => "nullable|string",
            "policy_heading" => "required|string",
            "policy_content" => "required|string",
            "policy_status" => "nullable|string|in:Yes",
        ]);

        $policy = Page::find(1);

        if(!empty($request->policy_title))
            $policy->policy_title = $request->policy_title;

        $policy->policy_heading = $request->policy_heading;
        $policy->policy_content = $request->policy_content;
        $policy->policy_status = $request->policy_status == "Yes" ? 1 : 0;

        $policy->update();

        return redirect()->route("admin.page.policy.edit")->with("status","Policy has been updated successfully!");
    }

    public function edit_contact () {
        $contact = Page::where("id",1)->select("contact_title","contact_heading","contact_content","contact_status")->first();
        return view("admin.contact_edit",compact("contact"));
    }

    public function update_contact (Request $request) {
        $request->validate([
            "contact_title" => "nullable|string",
            "contact_heading" => "required|string",
            "contact_content" => "required|string",
            "contact_status" => "nullable|string|in:Yes",
        ]);

        $contact = Page::find(1);

        if (!empty($request->contact_title))
            $contact->contact_title = $request->contact_title;

        $contact->contact_heading = $request->contact_heading;
        $contact->contact_content = $request->contact_content;
        $contact->contact_status = $request->contact_status == "Yes" ? 1 : 0;

        $contact->update();

        return redirect()->route("admin.page.contact.edit")->with("status","Contact has been updated successfully!");
    }

    public function edit_photo () {
        $photo = Page::where("id",1)->select("photo_title","photo_heading","photo_status")->first();
        return view("admin.photo2_edit",compact("photo"));
    }

    public function update_photo (Request $request) {
        $request->validate([
            "photo_title" => "nullable|string",
            "photo_heading" => "required|string",
            "photo_status" => "nullable|in:Yes",
        ]);

        $photo = Page::find(1);

        if(!empty($request->photo_title))
            $photo->photo_title = $request->photo_title;

        $photo->photo_heading = $request->photo_heading;
        $photo->photo_status = $request->photo_status == "Yes" ? 1 : 0;
        
        $photo->update();

        return redirect()->back()->with("status","Photo Galery has been updated successfully!");
    }

    public function edit_video () {
        $video = Page::where("id",1)->select("video_title","video_heading","video_status")->first();
        return view("admin.video2_edit",compact("video"));
    }

    public function update_video (Request $request) {
        $request->validate([
            "video_title" => "nullable|string",
            "video_heading" => "required|string",
            "video_status" => "nullable|in:Yes",
        ]);

        $video = Page::find(1);

        if(!empty($request->video_title))
            $video->video_title = $request->video_title;        

        $video->video_heading = $request->video_heading;
        $video->video_status = $request->video_status == "Yes" ? 1 : 0;
        
        $video->save();
        
        return redirect()->back()->with("status","Video Galery has been updated successfully!");
    }
}
