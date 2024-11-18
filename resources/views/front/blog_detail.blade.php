@extends("front.layout.app")
@section("title",$post->heading)
@section("heading",$post->heading)
@section("content")
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ asset("uploads/post/$post->photo") }}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ $post->updated_at->format("d F, Y") }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $post->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post->content !!}
                </div>
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection