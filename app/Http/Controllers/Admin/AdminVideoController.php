<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index () {
        $videos = Video::orderBy("created_at","DESC")->paginate(12);
        return view("admin.videos",compact("videos"));
    }
    
    public function add_video () {
        return view("admin.video_add");
    }

    public function edit_video ($video_id) {
        $video = Video::find($video_id);
        return view("admin.video_edit",compact("video"));
    }

    public function store_video (Request $request) {
        $request->validate([
            "video_id" => "required|string",
            "caption" => "nullable|string",
        ]);

        $video = new Video();

        if (!empty($request->caption))
            $video->caption = $request->caption;

        $video->video_id = $request->video_id;
        $video->save();

        return redirect()->route("admin.videos")->with("status","Video has been added successfully!");
    }

    public function update_video (Request $request) {
        $request->validate([
            // "video_own_id" => "required|numeric|exists:videos,id",
            "caption" => "nullable|string",
            "video_id" => "nullable|string",
        ]);

        $video = Video::find($request->video_own_id);

        if (!$video)
            return redirect()->route("admin.videos")->with("error", "Video not found!");

        if(!empty($request->caption))
            $video->caption = $request->caption;

        if(!empty($request->video_id))
            $video->video_id = $request->video_id;

        if (!empty($request->caption) || !empty($request->video_id))
            $video->update();

        return redirect()->route("admin.videos")->with("status","Video has been updated successfully!");
    }

    public function delete_video ($video_id) {
        $video = Video::find($video_id);
        
        if (!$video) 
            return redirect()->route("admin.videos")->with("error","Video not found!");

        $video->delete();

        return redirect()->route("admin.videos")->with("status","Video has been deleted successfully!");
    }
}
