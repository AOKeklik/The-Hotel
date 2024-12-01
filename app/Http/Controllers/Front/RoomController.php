<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index () {
        $rooms = Room::orderBy("id","DESC")->paginate(12);
        return view("front.rooms",compact("rooms"));
    }
    public function room ($room_id) {
        $room = Room::find($room_id);
        $amenities = Amenity::whereIn("id",explode(",",$room->amenities))->get();

        if(!$room) 
            return redirect()->route("front.index");
        
        return view("front.room",compact("room","amenities"));
    }
}
