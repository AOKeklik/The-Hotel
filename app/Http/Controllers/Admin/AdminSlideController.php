<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminSlideController extends Controller
{
    public function index () {
        $slides = Slide::orderBy("created_at", "DESC")->paginate(12);
        return view("admin.slides", compact("slides"));
    }

    public function add_slide () {        
        return view("admin.slide_add");
    }

    public function store_slide (Request $request) {
        $request->validate([
            "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            "heading" => "nullable|string|max:50",
            "text" => "nullable|string|max:150",
            "button_text" => "nullable|string|max:30",
            "button_url" => "nullable|url",
        ]);

        $slide = new Slide();

        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;

        if ($request->file("photo")) {
            
            if (!File::isdirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if (!File::isDirectory(public_path("uploads/slide")))
                File::makeDirectory(public_path("uploads/slide"));

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(1000,460,"center");
            $image->resize(1000,460,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/slide")."/".$image_name);

            
            $slide->photo = $image_name;
        }

        $slide->save();

        return redirect()->route("admin.slides")->with("status", "Slide has been created successfully!");
    }

    public function edit_slide ($slide_id) {
        $slide = Slide::find($slide_id);
        return view("admin.slide_edit", compact("slide"));
    }

    public function update_slide (Request $request) {
        $request->validate([
            // "slide_id" => "required|exists:slides,id",
            "heading" => "nullable|string|max:50",
            "text" => "nullable|string|max:150",
            "button_text" => "nullable|string|max:30",
            "button_url" => "nullable|url",
        ]);

        $slide = Slide::find($request->slide_id);

        if (!$slide)
            return redirect()->route("admin.slides")->with("error", "Slide not found!");

        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;

        if ($request->file("photo")) {

            $request->validate([
                "photo" => "file|mimes:jpg,jpeg,png|max:2048",
            ]);
            
            if (!File::isdirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if (!File::isDirectory(public_path("uploads/slide")))
                File::makeDirectory(public_path("uploads/slide"));

            if (File::isFile(public_path("uploads/slide")."/".$slide->photo))
                File::delete(public_path("uploads/slide")."/".$slide->photo);

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(1000,460,"center");
            $image->resize(1000,460,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/slide")."/".$image_name);

            
            $slide->photo = $image_name;
        }

        $slide->update();

        return redirect()->route("admin.slides")->with("status", "Slide has been updated successfully!");
    }

    public function delete_slide (Request $request) {
        $slide = Slide::find($request->slide_id);
        
        if (!$slide)
            return redirect()->route("admin.slides")->with("error", "Slide not found!");

        if (File::isFile(public_path("uploads/slide")."/".$slide->photo))
            File::delete(public_path("uploads/slide")."/".$slide->photo);

        $slide->delete();

        return redirect()->route("admin.slides")->with("status", "Slide has been deleted successfully!");
    }
}
