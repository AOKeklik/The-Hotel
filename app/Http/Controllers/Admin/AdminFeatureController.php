<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index () {
        $features = Feature::orderBy("id", "DESC")->paginate(12);
        return view("admin.features", compact("features"));
    }

    public function add_feature () {
        return view("admin.feature_add");
    }

    public function edit_feature ($feature_id) {
        $feature = Feature::find($feature_id);
        return view("admin.feature_edit", compact("feature"));
    }

    public function store_feature (Request $request) {
        $request->validate([
            "icon" => "required|string",
            "heading" => "required|nullable|string",
            "text" => "nullable|string",
        ]);

        $feature = new Feature();

        $feature->icon = $request->icon;
        $feature->heading = $request->heading;
        
        if (!empty($request->text))
            $feature->text = $request->text;

        $feature->save();
        
        return redirect()->route("admin.features")->with("status", "Feature has been created successfully!");
    }

    public function update_feature (Request $request) {
        $request->validate([
            "feature_id" => "required|string|exists:features,id",
            "icon" => "required|string",
            "heading" => "required|string",
            "text" => "nullable|string",
        ]);

        $feature = Feature::find($request->feature_id);

        if (!$feature)
            return redirect()->route("admin.features")->with("error", "Feature not found!");

        $feature->icon = $request->icon;
        $feature->heading = $request->heading;

        if (!empty($request->text))
            $feature->text = $request->text;

        $feature->update();

        return redirect()->route("admin.features")->with("status", "Feature has been updated successfully!");
    }

    public function delete_feature ($feature_id) {
        $feature = Feature::find($feature_id);

        if  (!$feature)
            return redirect()->route("admin.features")->with("error","Feature not found!");

        $feature->delete();

        return redirect()->route("admin.features")->with("status", "Feature has been deleted successfully!");
    }
}
