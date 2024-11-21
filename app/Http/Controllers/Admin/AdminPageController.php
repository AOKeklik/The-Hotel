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
            "about_status" => "nullable|string",
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
            "terms_status" => "nullable|string",
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
            "policy_status" => "nullable|string",
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
}