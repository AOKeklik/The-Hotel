<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index () {
        $faqs = Faq::orderBy("created_at","DESC")->get();
        return view("front.faq",compact("faqs"));
    }
}
