@extends("front.layout.app")
@section("title",$about->about_heading)
@section("heading",$about->about_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">{!! $about->about_content !!}</div>
        </div>
    </div>
</div>
@endsection