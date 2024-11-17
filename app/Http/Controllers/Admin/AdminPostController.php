<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminPostController extends Controller
{
    public function index () {
        $posts = Post::orderBy("id", "DESC")->paginate(12);
        return view("admin.posts", compact("posts"));
    }

    public function add_post () {
        return view("admin.post_add");
    }

    public function edit_post ($post_id) {
        $post = Post::find($post_id);
        return view("admin.post_edit", compact("post"));
    }

    public function store_post (Request $request) {
        $request->validate([
            "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            "heading" => "required|string",
            "short_content" => "required|string",
            "content" => "required|string",
        ]);

        $post = new Post();

        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->total_view = 1;

        if ($request->hasFile("photo")) {

            if(!File::isDirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if(!File::isDirectory(public_path("uploads/post")))
                File::makeDirectory(public_path("uploads/post"));

            if(!File::isDirectory(public_path("uploads/post/thumbnail")))
                File::makeDirectory(public_path("uploads/post/thumbnail"));

            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(1000,660,"center");
            $image->resize(1000,660,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/post/$image_name"));

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/post/thumbnail/$image_name"));

            $post->photo = $image_name;
        }

        $post->save();

        return redirect()->route("admin.posts")->with("status","Post has been created successfully!");
    }

    public function update_post (Request $request) {
        $request->validate([
            // "post_id" => "required|numeric|exists:posts,id",
            "heading" => "required|string",
            "short_content" => "required|string",
            "content" => "required|string",
        ]);

        if (empty($request->post_id))
            return redirect()->route("admin.posts")->with("error","Post not found!");

        $post = Post::find($request->post_id);

        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;

        if ($request->hasFile("photo")) {
            $request->validate([
                "photo" => "required|file|mimes:jpg,jpeg,png|max:2048",
            ]);

            if (!File::isDirectory(public_path("uploads")))
                File::makeDirectory(public_path("uploads"));

            if (!File::isDirectory(public_path("uploads/post")))
                File::makeDirectory(public_path("uploads/post"));
            
            if (!File::isDirectory(public_path("uploads/post/thumbnail")))
                File::makeDirectory(public_path("uploads/post/thumbnail"));

            if (File::isFile(public_path("uploads/post/$post->photo")))
                File::delete(public_path("uploads/post/$post->photo"));

            if (File::isFile(public_path("uploads/post/thumbnail/$post->photo")))
                File::delete(public_path("uploads/post/thumbnail/$post->photo"));
            
            $image_name = Carbon::now()->timestamp.".".$request->file("photo")->getClientOriginalExtension();
            $image = Image::read($request->file("photo")->path());

            $image->cover(1000,660,"center");
            $image->resize(1000,660,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/post/$image_name"));

            $image->cover(100,100,"top");
            $image->resize(100,100,function($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("uploads/post/thumbnail/$image_name"));

            $post->photo = $image_name;
        }

        $post->update();

        return redirect()->route("admin.posts")->with("status","Post has been created successfully!");
    }

    public function delete_post ($post_id) {
        $post = Post::find($post_id);
        
        if (!$post)
            return redirect()->route("admin.posts")->with("error","Post not found!");

        if(File::isFile(public_path("uploads/post/$post->photo")))
            File::delete(public_path("uploads/post/$post->photo"));

        if(File::isFile(public_path("uploads/post/thumbnail/$post->photo")))
            File::delete(public_path("uploads/post/thumbnail/$post->photo"));

        $post->delete();

        return redirect()->route("admin.posts")->with("status","Post has been deleted successfully!");
    }
}
