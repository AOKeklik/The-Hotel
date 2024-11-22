@extends("admin.layout.app")
@section("title",$photo->photo_heading)
@section("heading",$photo->photo_heading)
@section("link",route("front.photos"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.photos") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Photos</a>
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
                    <form action="{{ route("admin.page.photo.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Photo Title</label>
                            <input type="text" class="form-control" name="photo_title" value="{{ $photo->photo_title }}">
                            @error("photo_title") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo Heading</label>
                            <input type="text" class="form-control" name="photo_heading" value="{{ $photo->photo_heading }}">
                            @error("photo_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo Status</label>
                            <div class="toggle-container">
                                <input @if($photo->photo_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="photo_status" value="Yes">
                            </div>
                            @error("photo_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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