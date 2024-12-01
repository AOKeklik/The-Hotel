@extends("admin.layout.app")
@section("title","Add Amenities")
@section("heading","Add Amenities")
@section("link",route("admin.rooms"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.hotel.amenities") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Aminities</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.hotel.amenity.store") }}" method="post">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Amenity Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                            @error("emenity") <p class="text-danger m-0">{{ $message }}</p> @enderror
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