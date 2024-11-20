@extends("front.layout.app")
@section("title",$terms->terms_heading)
@section("heading",$terms->terms_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">{!! $terms->terms_content !!}</div>
        </div>
    </div>
</div>
@endsection