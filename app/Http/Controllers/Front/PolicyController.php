<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index () {
        $policy = Page::where("id",1)->select("policy_heading","policy_content","policy_status")->first();
        return view("front.policy",compact("policy"));
    }
}
