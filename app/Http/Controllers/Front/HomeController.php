<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $slides = Slide::orderBy("id", "DESC")->get()->take(7);
        $features = Feature::orderBy("id", "ASC")->get();
        $testimonials = Testimonial::orderBy("id", "ASC")->get()->take(7);
        $posts = Post::orderBy("created_at","DESC")->get()->take(3);

        return view("front.home", compact("slides","features","testimonials","posts"));
    }
}
