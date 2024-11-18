<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index () {
        $posts = Post::orderBy("created_at", "DESC")->paginate(12);

        return view("front.blog", compact("posts"));
    }

    public function post ($post_id) {
        $post = Post::find($post_id);
        $posts = Post::orderBy("created_at", "DESC")->paginate(12);

        if (!$post)
            return view("front.blog", compact("posts"));

        $post->total_view = $post->total_view + 1;
        $post->update();

        return view("front.blog_detail", compact("post"));
    }
}
