@extends("admin.layout.app")
@section("title","Edit Room")
@section("heading","Edit Room")
@section("link",route("front.index"))
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.hotel.rooms") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Rooms</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.hotel.room.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                            @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old("description") }}</textarea>
                            @error("description") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{ old("price") }}">
                            @error("price") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Amenities</label>
                            <div class="list-group">
                                @foreach($amenities as $amenity)
                                    <label class="list-group-item">
                                        <input @if(!empty(old("amenities")) && in_array($amenity->id, old("amenities"))) checked @endif class="form-check-input me-1" type="checkbox" name="amenities[]" value="{{ $amenity->id }}" />
                                        {{ $amenity->name }}
                                    </label>
                                @endforeach
                            </div>
                            @error("amenities") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Featured Photo</label>
                            <div>
                                <img src="" alt="" style="width:10rem;height:10rem;object-fit:cover;margin:1rem;display:none;">
                            </div>
                            <div >
                                <input onchange="handlerChangeImage(event)" type="file" name="featured_photo">
                            </div>
                            @error("featured_photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Video ID</label>
                            <div>
                                <img src="" alt="" style="width:10rem;height:10rem;object-fit:cover;margin:1rem;display:none;">
                            </div>
                            <input onchange="handlerChangeCode(event)" type="text" class="form-control" name="video_id" value="{{ old("video_id") }}">
                            @error("video_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Room Size</label>
                            <input type="text" class="form-control" name="size" value="{{ old("size") }}">
                            @error("size") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Rooms</label>
                            <input type="text" class="form-control" name="total_rooms" value="{{ old("total_rooms") }}">
                            @error("total_rooms") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Beds</label>
                            <input type="text" class="form-control" name="total_beds" value="{{ old("total_beds") }}">
                            @error("total_beds") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Bathrooms</label>
                            <input type="text" class="form-control" name="total_bathrooms" value="{{ old("total_bathrooms") }}">
                            @error("total_bathrooms") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Balconies</label>
                            <input type="text" class="form-control" name="total_balconies" value="{{ old("total_balconies") }}">
                            @error("total_balconies") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Guests</label>
                            <input type="text" class="form-control" name="total_guests" value="{{ old("total_guests") }}">
                            @error("total_guests") <p class="text-danger m-0">{{ $message }}</p> @enderror
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
@push("scripts")
    <script>
        function handlerChangeImage (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const files = e.target.files

            if (files.length === 0) return
            if (!img) return 

            img.setAttribute("src",URL.createObjectURL(files[0]))
            img.style.display = "inline-block"
        }
        function handlerChangeCode (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const vals = e.target.value

            if(!img) return
            if(vals.trim().length < 5) return

            img.setAttribute("src","https://img.youtube.com/vi/"+vals+"/0.jpg")
            img.style.display = "inline-block"
        }
        //https://img.youtube.com/vi/ekgUjyWe1Yc/0.jpg
    </script>
@endpush

