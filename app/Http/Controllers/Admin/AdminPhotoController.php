<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminPhotoController extends Controller
{
    public function index () {
        $photos = Photo::orderBy("created_at", "DESC")->paginate(12);
        return view("admin.photos",compact("photos"));
    }

    public function edit_photo ($photo_id) {
        $photo = Photo::find($photo_id);

        if(!$photo)
            return redirect()->route("admin.photos")->with("error","Photo not found!");

        return view("admin.photo_edit",compact("photo"));
    }

    public function add_photo () {
        return view("admin.photo_add");
    }

    public function store_photo (Request $request) {
        $request->validate([
            "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            "caption" => "nullable|string",
        ]);

        $photo = new Photo();

        if (!empty($request->caption))
            $photo->caption = $request->caption;

        if(!File::isDirectory(public_path("uploads")))
            File::makeDirectory(public_path("uploads"));

        if(!File::isDirectory(public_path("uploads/photo")))
            File::makeDirectory(public_path("uploads/photo"));

        if(!File::isDirectory(public_path("uploads/photo/thumbnail")))
            File::makeDirectory(public_path("uploads/photo/thumbnail"));

        $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
        $image = Image::read($request->file("photo")->path());

        $image->cover(680,400,"center");
        $image->resize(680,400,function($constraint){
            $constraint->aspectRatio();
        })->save(public_path("uploads/photo/$image_name"));

        $image->cover(100,100,"top");
        $image->resize(100,100,function($constraint){
            $constraint->aspectRatio();
        })->save(public_path("uploads/photo/thumbnail/$image_name"));

        $photo->photo = $image_name;

        $photo->save();

        return redirect()->route("admin.photos")->with("status","Photo has been created successfully!");
    }

    public function update_photo (Request $request) {
        $request->validate([
            // "photo_id" => "required|numeric|exists:photos,id",
            "caption" => "nullable|string",
        ]);

        $photo = Photo::find($request->photo_id);

        if(!$photo)
            return redirect()->route("admin.photos")->with("error","Photo not found!");

        if(!empty($request->caption))
            $photo->caption = $request->caption;

        if($request->hasFile("photo")) {
            $request->validate([
                "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if(File::isFile(public_path("uploads/photo/$photo->photo")))
            File::delete(public_path("uploads/photo/$photo->photo"));

            if(File::isFile(public_path("uploads/photo/thumbnail/$photo->photo")))
                File::delete(public_path("uploads/photo/thumbnail/$photo->photo"));

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(680,400,"center");
            $image->resize(680,400,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/photo/$image_name"));

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/photo/thumbnail/$image_name"));

            $photo->photo = $image_name;
        }

        $photo->update();

        return redirect()->route("admin.photos")->with("status","Photo has been updated successfully!");
    }

    public function delete_photo ($photo_id) {
        $photo = Photo::find($photo_id);

        if (!$photo)
            return redirect()->route("admin.photos")->with("error","Photo not found!");

        if(File::isFile(public_path("uploads/photo/$photo->photo")))
            File::delete(public_path("uploads/photo/$photo->photo"));

        if(File::isFile(public_path("uploads/photo/thumbnail/$photo->photo")))
            File::delete(public_path("uploads/photo/thumbnail/$photo->photo"));

        $photo->delete();

        return redirect()->route("admin.photos")->with("status","Photo has been deleted successfully!");
    }
}
