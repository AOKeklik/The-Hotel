<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index () {
        $terms = Page::where("id",1)->select("terms_title","terms_heading","terms_content")->first();
        return view("front.terms",compact("terms"));
    }
}
