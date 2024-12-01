@extends("admin.layout.app")
@section("title","Rooms")
@section("heading","Rooms")
@section("link",route("front.rooms"))
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.hotel.room.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Room</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                        @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Room Photo</th>
                                <th>Room Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td><img src="{{ asset("uploads/room/thumbnail/$room->featured_photo") }}" alt=""></td>
                                        <td>{{ $room->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.hotel.room.gallery",["room_id"=>$room->id]) }}" class="btn btn-primary">Room Gallery</a>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $room->id }}">Details</button>
                                            <a href="{{ route("admin.hotel.room.edit",["room_id"=>$room->id]) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route("admin.hotel.room.delete", ["room_id"=>$room->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>                                        
                                        <!-- Modal -->
                                        <div class="modal fade modal-xl" id="exampleModal-{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $room->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">name</label></div>
                                                            <div class="col-md-8">{{ $room->name }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">description</label></div>
                                                            <div class="col-md-8">{{ $room->description }} </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">price</label></div>
                                                            <div class="col-md-8">${{ $room->price }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">amenities</label></div>
                                                            <div class="col-md-8">
                                                                @php $amenities = \App\Models\Amenity::whereIn("id", explode(",",$room->amenities))->get(); @endphp
                                                                @foreach($amenities as $key => $val) 
                                                                    @if(count($amenities) - 1 == $key)
                                                                        <span>{{ $val->name }}</span>
                                                                    @else
                                                                        <span>{{ $val->name }}</span>,
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">featured_photo</label></div>
                                                            <div class="col-md-8">
                                                                <img src="{{ asset("uploads/room/thumbnail/$room->featured_photo") }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">video_id</label></div>
                                                            <div class="col-md-8">
                                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $room->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">size</label></div>
                                                            <div class="col-md-8">{{ $room->size }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">total_rooms</label></div>
                                                            <div class="col-md-8">{{ $room->total_rooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">total_beds</label></div>
                                                            <div class="col-md-8">{{ $room->total_beds }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">total_bathrooms</label></div>
                                                            <div class="col-md-8">{{ $room->total_bathrooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">total_balconies</label></div>
                                                            <div class="col-md-8">{{ $room->total_balconies }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">total_guests</label></div>
                                                            <div class="col-md-8">{{ $room->total_guests }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal --}}
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