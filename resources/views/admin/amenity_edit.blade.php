@extends("admin.layout.app")
@section("title","Edit Amenity")
@section("heading","Edit Amenity")
@section("link",route("front.rooms"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.hotel.amenities") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Amenities</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @error("amenity_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    <form action="{{ route("admin.hotel.amenity.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="amenity_id" value="{{ Request::route("amenity_id") }}">
                        <div class="form-group mb-3">
                            <label>Amenity Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $amenity->name }}">
                            @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
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