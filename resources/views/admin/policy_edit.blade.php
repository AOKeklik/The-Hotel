@extends("admin.layout.app")
@section("title","Edit Privacy Policy")
@section("heading","Edit Privacy Policy")
@section("link",route("front.policy"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboard</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has("status")) <p class="alert alert-success">{{ Session::get("status") }}</p> @endif 
                    @if(Session::has("error")) <p class="alert alert-danger">{{ Session::get("error") }}</p> @endif                     
                    <form action="{{ route("admin.page.policy.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Policy Heading *</label>
                            <input type="text" class="form-control" name="policy_heading" value="{{ $policy->policy_heading }}">
                            @error("policy_heading") <p class="text-danger p-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Policy Content *</label>
                            <textarea name="policy_content" class="form-control snote" cols="30" rows="10">{{ $policy->policy_content }}</textarea>
                            @error("policy_content") <p class="text-danger p-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Policy Status *</label>
                            <div class="toggle-container">
                                <input @if($policy->policy_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="policy_status" value="Yes">
                            </div>
                            @error("policy_status") <p class="text-danger p-1">{{ $message }}</p> @enderror
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