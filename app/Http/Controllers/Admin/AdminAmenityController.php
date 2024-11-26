<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index () {
        $amenities = Amenity::orderBy("id","DESC")->paginate(12);
        return view("admin.amenities",compact("amenities"));
    }

    public function add_amenity () {
        return view("admin.amenity_add");
    }

    public function edit_amenity ($amenity_id) {
        $amenity = Amenity::find($amenity_id);
        return view("admin.amenity_edit",compact("amenity"));
    }

    public function delete_amenity ($amenity_id) {
        $amenity = Amenity::find($amenity_id);

        if(!$amenity)
            return redirect()->back()->with("status","Amenity not found!");

        $amenity->delete();
        
        return redirect()->back()->with("status","Amenity has been deleted successfully!");
    }

    public function store_amenity (Request $request) {
        $request->validate([
            "name" => "required|string"
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;

        $amenity->save();

        return redirect()->route("admin.hotel.amenities")->with("status","Amenity has been created successfully!");
    }

    public function update_amenity (Request $request) {
        $request->validate([
            "amenity_id"=>"required|numeric|exists:amenities,id",
            "name"=>"required|string"
        ]);

        $amenity = Amenity::find($request->amenity_id);

        if(!$amenity)
            return redirect()->route("admin.hotel.amenities")->with("error","Amenity not found!");

        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->route("admin.hotel.amenities")->with("status","Amenity has been updated successfully!");
    }
}
