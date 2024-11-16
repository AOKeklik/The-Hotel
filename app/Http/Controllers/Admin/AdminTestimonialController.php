<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminTestimonialController extends Controller
{
    public function index () {
        $testimonials = Testimonial::orderBy("id", "DESC")->paginate(12);

        return view("admin.testimonials", compact("testimonials"));
    }

    public function edit_testimonial ($testimonial_id) {
        $testimonial = Testimonial::find($testimonial_id);

        if (!$testimonial)
            return redirect()->route("admin.testimonials")->with("error","Testimonial not found!");

        return view("admin.testimonial_edit", compact("testimonial"));
    }

    public function add_testimonial () {
        return view("admin.testimonial_add");
    }

    public function store_testimonial (Request $request) {
        $request->validate([
            "photo" => "required|image|mimes:jpg,jpeg,png|max:2048",
            "name" => "required|string",
            "designation" => "required|string",
            "comment" => "required|string",
        ]);

        $testimonial = new Testimonial();

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        
        if ($request->hasFile("photo")) {

            if (!File::isDirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if (!File::isDirectory(public_path("uploads/testimonial")))
                File::makeDirectory(public_path("uploads/testimonial"));

            if (!File::isDirectory(public_path("uploads/testimonial/thumbnail")))
                File::makeDirectory(public_path("uploads/testimonial/thumbnail"));

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(300,300,"center");
            $image->resize(300,300,function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/testimonial")."/".$image_name);

            $image->cover(100,100,"top");
            $image->resize(100,100,function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/testimonial/thumbnail")."/".$image_name);

            $testimonial->photo = $image_name;
        }        

        $testimonial->save();

        return redirect()->route("admin.testimonials")->with("status","Testimonial has been created successfully!");
    }

    public function update_testimonial (Request $request) {
        $request->validate([
            "testimonial_id" => "required|numeric|exists:testimonials,id",
            "name" => "required|string",
            "designation" => "required|string",
            "comment" => "required|string",
        ]);

        $testimonial = Testimonial::find($request->testimonial_id);

        if (!$testimonial)
            return redirect()->route("admin.testimonials")->with("error","Testimonial not found!");

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;

        if (!$testimonial->photo) 
            return redirect()->back()->with("error","Pohoto field is required!");
        
        if ($request->hasFile("photo")) {
            $request->validate([
                "photo" => "required|image|mimes:jpg,jpeg,png|max:2048",
            ]);
            
            if (!File::isDirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if (!File::isDirectory(public_path("uploads/testimonial"))) 
                File::makeDirectory(public_path("uploads/testimonial"));

            if (File::isFile(public_path("uploads/testimonial")."/".$testimonial->photo)) {
                File::delete(public_path("uploads/testimonial")."/".$testimonial->photo);
                File::delete(public_path("uploads/testimonial/thumbnail")."/".$testimonial->photo);
            }

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(300,300,"center");
            $image->resize(300,300,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/testimonial")."/".$image_name);

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/testimonial/thumbnail")."/".$image_name);

            $testimonial->photo = $image_name;
        }

        $testimonial->update();

        return redirect()->route("admin.testimonials")->with("status","Testimonial has been updated successfully!");
    }

    public function delete_testimonial ($testimonial_id) {
        $testimonial = Testimonial::find($testimonial_id);

        if (!$testimonial)
            return redirect()->route("admin.testimonials")->with("error","Testimonial not found!");

        if (File::isFile(public_path("uploads/testimonial/{$testimonial->photo}")))
            File::delete(public_path("uploads/testimonial/{$testimonial->photo}"));

        if (File::isFile(public_path("uploads/testimonial/thumbnail/{$testimonial->photo}")))
            File::delete(public_path("uploads/testimonial/thumbnail/{$testimonial->photo}"));

        $testimonial->delete();

        return redirect()->route("admin.testimonials")->with("status","Testimonial has been deleted successfully!");
    }
}
