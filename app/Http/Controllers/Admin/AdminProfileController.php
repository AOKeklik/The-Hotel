<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class AdminProfileController extends Controller
{
    public function index () {
        return view("admin.profile");
    }

    public function submit_profile (Request $request) {
        $request->validate([
            "admin_id" => "required|exists:admins,id",
            "name" => "required|string",
            "email" => "required|email",
        ]);


        $admin = Admin::find($request->admin_id);

        if (!$admin)
            return redirect()->back()->with("error", "Invalid admin id!");

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->has("new_password") && $request->new_password) {

            $request->validate([
                "new_password" => "required|string|min:8",
                "retype_password" => "required|string|min:8|same:new_password",
            ]);

            $pass = Hash::make($request->new_password);
            $admin->password = $pass;
        }

        if ($request->hasFile("photo")) {

            $request->validate([
                "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            $destination_path = public_path("uploads");
            $destination_admin_path = public_path("uploads/admin");
            $image_old = $admin->photo;
            $image_extension = $request->file("photo")->getClientOriginalExtension();
            $image_name = Carbon::now()->timestamp.".".$image_extension;
            $image_path = $request->file("photo")->path();

            if (!File::isDirectory($destination_path))
                File::makeDirectory($destination_path, 0577, true);

            if (!File::isDirectory($destination_admin_path))
                File::makeDirectory($destination_admin_path, 0577, true);

            if (File::isFile($destination_admin_path."/".$image_old))            
                File::delete($destination_admin_path."/".$image_old);

            
            $image = Image::read($image_path);
            
            $image->cover(600,600,"center");
            $image->resize(600,600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination_admin_path."/".$image_name);
            
            $admin->photo = $image_name;
        }

        $admin->update();

        return redirect()->back()->with("status", "Admin has been updated successfully!");
    }
}
