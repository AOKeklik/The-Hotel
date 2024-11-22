<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function photos () {
        $photos = Photo::orderBy("created_at","DESC")->paginate(4);
        $photo_heading = Page::where("id",1)->select("photo_heading")->first()->photo_heading;
        return view("front.photos",compact("photos","photo_heading"));
    }

    public function videos () {
        $videos = Video::orderBy("created_at","DESC")->paginate(4);
        $video_heading = Page::where("id",1)->select("video_heading")->first()->video_heading;
        return view("front.videos",compact("videos","video_heading"));
    }
}
