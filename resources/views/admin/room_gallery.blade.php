@extends("admin.layout.app")
@section("title","Room Gallery")
@section("heading",$room->name." Gallery")
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
                    @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                    @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                    <form action="{{ route("admin.hotel.room.gallery.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="room_id" value="{{ request("room_id") }}">
                        @error("room_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div id="photos-wrapper" class="d-flex gap-1 p-1 flex-wrap">

                            </div>
                            <div>
                                <input onchange="handlerChangePhoto(event)" type="file" name="photos[]" multiple>
                            </div>
                            @error("photos") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                    <tr>
                                        <td>{{ $gallery->id }}</td>
                                        <td><img src="{{ asset("uploads/room-gallery/thumbnail/$gallery->photo") }}" alt=""></td>
                                        <td>{{ $gallery->room->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.hotel.room.gallery.edit", ["gallery_id" => $gallery->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.hotel.room.gallery.delete", ["gallery_id" => $gallery->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script>
        function handlerChangePhoto(e) {
            const wrapper = document.getElementById("photos-wrapper")
            const files = e.target.files
            
            if(!wrapper) return
            if(!files.length === 0) return
            
            Object.values(files).forEach(file => {
                const img = document.createElement("img")
                img.setAttribute("src", URL.createObjectURL(file))
                img.style = "width:200px;height:200px;"
                wrapper.appendChild(img)
            })
        }
    </script>
@endpush