@extends("front.layout.app")
@section("title",$policy->policy_heading)
@section("heading",$policy->policy_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">{!! $policy->policy_content !!}</div>
        </div>
    </div>
</div>
@endsection