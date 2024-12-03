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
        return view("front.photos",compact("photos"));
    }

    public function videos () {
        $videos = Video::orderBy("created_at","DESC")->paginate(4);
        return view("front.videos",compact("videos"));
    }
}
