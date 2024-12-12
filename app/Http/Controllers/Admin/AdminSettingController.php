<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminSettingController extends Controller
{
    public function edit_setting () {
        $setting = Setting::find(1);
        return view("admin.setting",compact("setting"));
    }

    public function update_setting (Request $request) {
        $request->validate([            
            "top_phono" => "required|string",
            "top_email" => "required|email",
            "footer_address" => "required|string",
            "footer_email" => "required|email",
            "footer_phone" => "required|string",
            "footer_copyright" => "required|string",
            "theme_color_1" => "required|string",
            "theme_color_2" => "required|string",
            "analytic_id" => "required|string",
            "home_feature_limit" => "required|numeric",
            "home_feature_status" => "nullable|string|in:Yes",
            "home_room_limit" => "required|numeric",
            "home_room_status" => "nullable|string|in:Yes",
            "home_testimonial_status" => "nullable|string|in:Yes",
            "home_post_limit" => "required|numeric",
            "home_post_status" => "nullable|string|in:Yes",
        ]);

        
        $setting = Setting::find(1);

        if($request->hasFile("favicon")) {
            $request->validate([
                "favicon" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if(!File::isDirectory(public_path("uploads/setting")))
                File::makeDirectory(public_path("uploads/setting"), 0577, true);

            if(File::isFile(public_path("uploads/setting/$setting->favicon")))
                File::delete(public_path("uploads/setting/$setting->favicon"));

            $image_name = uniqid().".".$request->file("favicon")->getClientOriginalExtension();
            $image_path = $request->file("favicon")->path();
            $image = Image::read($image_path);

            $image->cover(30,30,"center");
            $image->resize(30,30,function($constriction){
                $constriction->aspectRatio();
            })->save(public_path("uploads/setting/$image_name"));

            $setting->favicon = $image_name;
        }

        if($request->hasFile("logo")) {
            $request->validate([
                "logo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if(!File::isDirectory(public_path("uploads/setting")))
                File::makeDirectory(public_path("uploads/setting"),0577,true);

            if(File::isFile(public_path("uploads/setting/$setting->logo")))
                File::delete(public_path("uploads/setting/$setting->logo"));

            $image_name = uniqid().".".$request->file("logo")->getClientOriginalExtension();
            $image_path = $request->file("logo")->path();
            $image = Image::read($image_path);

            $image->cover(600,200,"center");
            $image->resize(600,200,function($constriction){
                $constriction->aspectRatio();
            })->save(public_path("uploads/setting/$image_name"));

            $setting->logo = $image_name;
        }

        $setting->top_phono = $request->top_phono;
        $setting->top_email = $request->top_email;
        $setting->footer_address = $request->footer_address;
        $setting->footer_email = $request->footer_email;
        $setting->footer_phone = $request->footer_phone;
        $setting->footer_copyright = $request->footer_copyright;
        $setting->footer_facebook = $request->footer_facebook;
        $setting->footer_twitter = $request->footer_twitter;
        $setting->footer_pinterest = $request->footer_pinterest;
        $setting->footer_linkedin = $request->footer_linkedin;
        $setting->footer_instagram = $request->footer_instagram;
        $setting->theme_color_1 = $request->theme_color_1;
        $setting->theme_color_2 = $request->theme_color_2;
        $setting->analytic_id = $request->analytic_id;
        $setting->home_feature_limit = $request->home_feature_limit;
        $setting->home_feature_status = $request->home_feature_status == "Yes" ? 1 : 0;
        $setting->home_room_limit = $request->home_room_limit;
        $setting->home_room_status = $request->home_room_status == "Yes" ? 1 : 0;
        $setting->home_testimonial_status = $request->home_testimonial_status == "Yes" ? 1 : 0;
        $setting->home_post_limit = $request->home_post_limit;
        $setting->home_post_status = $request->home_post_status == "Yes" ? 1 : 0;

        $setting->update();

        return redirect()->back()->with("status","Setting has been updated successfully!");
    }
}
