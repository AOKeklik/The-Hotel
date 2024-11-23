@extends("admin.layout.app")
@section("title","Edit Blog")
@section("heading","Edit Blog")
@section("link",route("front.blog"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.posts") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Posts</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif 
                    @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif                     
                    <form action="{{ route("admin.page.blog.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="blog_title" value="{{ $blog->blog_title }}">
                            @error("blog_title") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Blog Heading</label>
                            <input type="text" class="form-control" name="blog_heading" value="{{ $blog->blog_heading }}">
                            @error("blog_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Blog Status</label>
                            <div class="toggle-container">
                                <input @if($blog->blog_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="blog_status" value="Yes">
                            </div>
                            @error("blog_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection