<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index () {
        $about = Page::where("id",1)->select("about_heading","about_content")->first();
        return view("front.about",compact("about"));
    }
}
