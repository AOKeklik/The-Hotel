@extends("admin.layout.app")
@section("title","Edit ".$gallery->room->name)
@section("heading","Edit ".$gallery->room->name)
@section("link",route("front.index"))
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.hotel.room.gallery", ["room_id"=>$gallery->room->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Back to Gallery</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.hotel.room.gallery.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="gallery_id" value="{{ request("gallery_id") }}">
                        @error("gallery_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="{{ asset("uploads/room-gallery/thumbnail/$gallery->photo") }}" alt="" style="display:block;padding:1rem;width:150px;height:150px">
                            <div>
                                <input onchange="handlerChangeImage(event)" type="file" name="photo">
                            </div>
                            @error("photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
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
        function handlerChangeImage(e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const files = e.target.files

            if(!img)return
            if(files.length===0)return

            img.setAttribute("src",URL.createObjectURL(files[0]))
        }
    </script>
@endpush