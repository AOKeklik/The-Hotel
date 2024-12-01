<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Photo;
use App\Models\Room;
use App\Models\RoomPhoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminRoomController extends Controller
{
    public function index () {
        $rooms = Room::orderBy("id","DESC")->paginate(12);
        return view("admin.rooms",compact("rooms"));
    }

    public function add_room () {
        $amenities = Amenity::orderBy("id","DESC")->get();
        return view("admin.room_add",compact("amenities"));
    }

    public function store_room (Request $request) {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "price" => "required|numeric",
            "amenities" => "nullable|array|exists:amenities,id",
            "featured_photo" => "required|image|mimes:jpg,jpeg,png|max:2048",
            "video_id" => "nullable|string",
            "size" => "nullable|string",
            "total_rooms" => "required|numeric",
            "total_beds" => "nullable|numeric",
            "total_bathrooms" => "nullable|numeric",
            "total_balconies" => "nullable|numeric",
            "total_guests" => "nullable|numeric",
        ]);

        $room = new Room();

        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->amenities = $request->has("amenities") ? implode(",",$request->amenities) : null;
        
        if($request->hasFile("featured_photo")) {
            $image_name = Carbon::now()->timestamp.".".$request->file("featured_photo")->getClientOriginalExtension();
            $image_path = $request->file("featured_photo")->path();
            
            if(!File::isDirectory(public_path("uploads/room/thumbnail")))
                File::makeDirectory(public_path("uploads/room/thumbnail"),0755,true);
        
            $image = Image::read($image_path);

            $image->cover(1000,460,"center");
            $image->resize(1000,460,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room/$image_name"));

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room/thumbnail/$image_name"));

            $room->featured_photo = $image_name;
        }

        $room->video_id = $request->has("video_id") ? $request->video_id : null;
        $room->size = $request->has("size") ? $request->size : null;
        $room->total_rooms = $request->total_rooms;
        $room->total_beds = $request->has("total_beds") ? $request->total_beds : null;
        $room->total_bathrooms = $request->has("total_bathrooms") ? $request->total_bathrooms : null;
        $room->total_balconies = $request->has("total_balconies") ? $request->total_balconies : null;
        $room->total_guests = $request->has("total_guests") ? $request->total_guests : null;

        $room->save();

        return redirect()->route("admin.hotel.rooms")->with("status","Room has been created successfully!");
    }

    public function edit_room ($room_id) {
        $room = Room::find($room_id);
        $amenities = Amenity::orderBy("id","DESC")->get();
        return view("admin.room_edit",compact("room","amenities"));
    }

    public function delete_room ($room_id) {
        $room = Room::find($room_id);

        if(!$room)
            return redirect()->back()->with("error","Room not found!");

        if(File::isFile(public_path("uploads/room/$room->featured_photo")))
            File::delete(public_path("uploads/room/$room->featured_photo"));

        if(File::isFile(public_path("uploads/room/thumbnail/$room->featured_photo")))
            File::delete(public_path("uploads/room/thumbnail/$room->featured_photo"));

        foreach($room->roomPhotos as $roomPhoto) {
            if(File::isFile(public_path("uploads/room-gallery/$roomPhoto->photo")))
                File::delete(public_path("uploads/room-gallery/$roomPhoto->photo"));                

            if(File::isFile(public_path("uploads/room-gallery/thumbnail/$roomPhoto->photo")))
                File::delete(public_path("uploads/room-gallery/thumbnail/$roomPhoto->photo"));            
        }

        $room->delete();

        return redirect()->back()->with("status","Room has been deleted successfully!");
    }

    public function update_room (Request $request) {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "price" => "required|numeric",
            "amenities" => "nullable|array|exists:amenities,id",
            "video_id" => "nullable|string",
            "size" => "nullable|string",
            "total_rooms" => "required|numeric",
            "total_beds" => "nullable|numeric",
            "total_bathrooms" => "nullable|numeric",
            "total_balconies" => "nullable|numeric",
            "total_guests" => "nullable|numeric",
        ]);
        
        $room = Room::find($request->room_id);

        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->amenities = $request->has("amenities") ? implode(",",$request->amenities) : null;

        if($request->hasFile("featured_photo")) {
            $request->validate([
                "featured_photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if(File::isFile(public_path("uploads/room/$room->featured_photo")))
                File::delete(public_path("uploads/room/$room->featured_photo"));

            if(File::isFile(public_path("uploads/room/thumbnail/$room->featured_photo")))
                File::delete(public_path("uploads/room/thumbnail/$room->featured_photo"));
        
            $image_name = Carbon::now()->timestamp.".".$request->file("featured_photo")->getClientOriginalExtension();
            $image_path = $request->file("featured_photo")->path();

            $image = Image::read($image_path);

            $image->cover(1000,460,"center");
            $image->resize(1000,460,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room/$image_name"));

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room/thumbnail/$image_name"));

            $room->featured_photo = $image_name;
        }

        $room->video_id = $request->has("video_id") ? $request->video_id : null;
        $room->size = $request->has("size") ? $request->size : null;
        $room->total_rooms = $request->total_rooms;
        $room->total_beds = $request->has("total_beds") ? $request->total_beds : null;
        $room->total_bathrooms = $request->has("total_bathrooms") ? $request->total_bathrooms : null;
        $room->total_balconies = $request->has("total_balconies") ? $request->total_balconies : null;
        $room->total_guests = $request->has("total_guests") ? $request->total_guests : null;

        $room->update();

        return redirect()->route("admin.hotel.rooms")->with("status","Room has been updated successfully!");
    }

    public function gallery_room ($room_id) {
        $galleries = RoomPhoto::where("room_id",$room_id)->orderBy("id","DESC")->paginate(12);
        $room = Room::find($room_id);

        if(!$room)
            return redirect()->route("admin.hotel.rooms")->with("Room not found!");

        return view("admin.room_gallery",compact("galleries","room"));
    }

    public function store_gallery_room (Request $request) {
        $request->validate([
            "room_id" => "required|numeric|exists:rooms,id",
            "photos" => "required|array",
            "photos.*" => "required|file|mimes:jpg,jpeg,png|max:2048",
        ]);

        if(!File::isDirectory(public_path("uploads/room-gallery/thumbnail")))
            File::makeDirectory(public_path("uploads/room-gallery/thumbnail"),0755,true);

        if($request->has("photos")){
            foreach ($request->file("photos") as $photo) {
                $room_gallery = new RoomPhoto();
                $room_gallery->room_id = $request->room_id;

                $img_name = uniqid().".".$photo->getClientOriginalExtension();
                $img_path = $photo->path();

                $img = Image::read($img_path);

                $img->cover(1000,460,"center");
                $img->resize(1000,460,function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path("uploads/room-gallery/$img_name"));   

                $img->cover(100,100,"top");
                $img->resize(100,100,function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path("uploads/room-gallery/thumbnail/$img_name"));

                $room_gallery->photo = $img_name;
                $room_gallery->save();
            }
        }

        return redirect()->back()->with("status","Photo has been added successfully!");
    }

    public function delete_gallery_room ($gallery_id) {
        $gallery = RoomPhoto::find($gallery_id);

        if(!$gallery)
            return redirect()->back()->with("error","Photo not found!");

        if(File::isFile(public_path("uploads/room-gallery/$gallery->photo")))
            File::delete(public_path("uploads/room-gallery/$gallery->photo"));


        if(File::isFile(public_path("uploads/room-gallery/thumbnail/$gallery->photo")))
            File::delete(public_path("uploads/room-gallery/thumbnail/$gallery->photo"));

        $gallery->delete();

        return redirect()->back()->with("status","Photo has been deleted successfully!");
    }

    public function edit_gallery_room ($gallery_id) {
        $gallery = RoomPhoto::find($gallery_id);

        if(!$gallery)
            return redirect()->back()->with("error","Gallery Photo not found!");

        return view("admin.room_gallery_edit",compact("gallery"));
    }

    public function update_gallery_room (Request $request) {
        $request->validate([
            "gallery_id" => "required|numeric",
        ]);

        $gallery = RoomPhoto::find($request->gallery_id);


        if($request->hasFile("photo")) {
            $request->validate([
                "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if(File::isFile(public_path("uploads/room-gallery/$gallery->photo")))
                File::delete(public_path("uploads/room-gallery/$gallery->photo"));
            
            if(File::isFile(public_path("uploads/room-gallery/thumbnail/$gallery->photo")))
                File::delete(public_path("uploads/room-gallery/thumbnail/$gallery->photo"));

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image_path = $request->file("photo")->path();

            $image = Image::read($image_path);

            $image->cover(1000,460,"top");
            $image->resize(1000,460,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room-gallery/$image_name"));

            $image->cover(100,100,"center");
            $image->resize(100,100,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path("uploads/room-gallery/thumbnail/$image_name"));

            $gallery->photo = $image_name;
        }

        $gallery->update();

        return redirect()->route("admin.hotel.room.gallery",["room_id"=>$gallery->room->id])->with("status",$gallery->room->name." Gallery Photo has been updated successfully!");
    }

}
