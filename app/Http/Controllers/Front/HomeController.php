<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Room;
use App\Models\Slide;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $slides = Slide::orderBy("id", "DESC")->limit(7)->get();
        $features = Feature::orderBy("id", "ASC")->get();
        $testimonials = Testimonial::orderBy("id", "ASC")->limit(7)->get();
        $posts = Post::orderBy("created_at","DESC")->limit(3)->get();
        $rooms = Room::orderBy("id","DESC")->limit(4)->get();

        return view("front.home", compact("slides","features","testimonials","posts","rooms"));
    }
}
