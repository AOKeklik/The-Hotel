@extends("admin.layout.app")
@section("title","Edit - ".$room->name)
@section("heading","Edit - ".$room->name)
@section("link",route("front.room", ["room_id"=>$room->id]))
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
                    <form action="{{ route("admin.hotel.room.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $room->name }}">
                            @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $room->description }}</textarea>
                            @error("description") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $room->price }}">
                            @error("price") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Amenities</label>
                            <div class="list-group">
                                @foreach($amenities as $amenity)
                                    <label class="list-group-item">
                                        <input name="amenities[]" @if(in_array($amenity->id,explode(",",$room->amenities))) checked @endif class="form-check-input me-1" type="checkbox" value="{{ $amenity->id }}" />
                                        {{ $amenity->name }}
                                    </label>
                                @endforeach
                            </div>  
                            @error("amenities") <p class="text-danger m-0">{{ $message }}</p> @enderror                          
                        </div>
                        <div class="form-group mb-3">
                            <label>Featured Photo</label>
                            <div>
                                <img src="{{ asset("uploads/room/thumbnail/$room->featured_photo") }}" alt="" style="width:10rem;height:10rem;object-fit:cover;margin:1rem;">
                            </div>
                            <div >
                                <input onchange="handlerChangeImage(event)" type="file" name="featured_photo">
                            </div>
                            @error("featured_photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Video ID</label>
                            <div>
                                @if(empty($room->video_id))
                                    <img src="" alt="" style="width:10rem;height:10rem;object-fit:cover;margin:1rem;display:none;">
                                @else
                                    <img src="https://img.youtube.com/vi/{{ $room->video_id }}/0.jpg" alt="" style="width:10rem;height:10rem;object-fit:cover;margin:1rem;">
                                @endif
                            </div>
                            <input onchange="handlerChangeVideo(event)" type="text" class="form-control" name="video_id" value="{{ $room->video_id }}">
                            @error("video_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Room Size</label>
                            <input type="text" class="form-control" name="size" value="{{ $room->size }}">
                            @error("size") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Rooms</label>
                            <input type="text" class="form-control" name="total_rooms" value="{{ $room->total_rooms }}">
                            @error("total_rooms") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Beds</label>
                            <input type="text" class="form-control" name="total_beds" value="{{ $room->total_beds }}">
                            @error("total_beds") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Bathrooms</label>
                            <input type="text" class="form-control" name="total_bathrooms" value="{{ $room->total_bathrooms }}">
                            @error("total_bathrooms") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Balconies</label>
                            <input type="text" class="form-control" name="total_balconies" value="{{ $room->total_balconies }}">
                            @error("total_balconies") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Total Guests</label>
                            <input type="text" class="form-control" name="total_guests" value="{{ $room->total_guests }}">
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

            if(!img) return
            if(files.length === 0) return

            img.setAttribute("src",URL.createObjectURL(files[0]))
        }
        function handlerChangeVideo (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const vals = e.target.value
            
            if(!img) return 
            if(vals.length < 5) return

            img.setAttribute("src","https://img.youtube.com/vi/"+vals.trim()+"/0.jpg");
            img.style.display = "inline-block"
        }
        //https://img.youtube.com/vi/PKATJiyz0iI/0.jpg
    </script>
@endpush