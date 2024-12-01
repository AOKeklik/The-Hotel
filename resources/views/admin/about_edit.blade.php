@extends("admin.layout.app")
@section("title","Edit About")
@section("link",route("front.about"))
@section("heading","Edit About")
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
                    @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @enderror
                    @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @enderror
                    <form action="{{ route("admin.page.about.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>About Heading *</label>
                            <input type="text" class="form-control" name="about_heading" value="{{ $about->about_heading }}">
                            @error("about_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>About Content *</label>
                            <textarea name="about_content" class="form-control snote" cols="30" rows="10">{{ $about->about_content }}</textarea>
                            @error("about_content") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>About Status *</label>
                            <div class="toggle-container">
                                <input @if($about->about_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="about_status" value="Yes">
                            </div>
                            @error("about_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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