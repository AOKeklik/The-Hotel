<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index () {
        $faqs = Faq::orderBy("created_at","DESC")->get();
        $faq_heading = Page::where("id",1)->select("faq_heading")->first()->faq_heading;
        return view("front.faq",compact("faqs","faq_heading"));
    }
}
