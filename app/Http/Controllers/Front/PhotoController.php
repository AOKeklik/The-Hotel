<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index () {
        $photos = Photo::orderBy("created_at","DESC")->paginate(3);
        return view("front.photos",compact("photos"));
    }
}
