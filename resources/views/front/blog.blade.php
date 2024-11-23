@extends("front.layout.app")
@section("title",$post_heading)
@section("heading",$post_heading)
@section("content")
<div class="blog-item">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset("uploads/post/$post->photo") }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route("front.blog.detail", ["post_id" => $post->id]) }}">{{ $post->heading }}</a></h2>
                            <div class="short-des">
                                <p>{{ $post->short_content }}</p>
                            </div>
                            <div class="button">
                                <a href="{{ route("front.blog.detail", ["post_id" => $post->id]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection