<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $slides = Slide::orderBy("id", "DESC")->get()->take(8);
        return view("front.home", compact("slides"));
    }
}
