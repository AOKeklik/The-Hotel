@extends("admin.layout.app")
@section("title","Edit Rooms Page")
@section("heading","Edit Rooms Page")
@section("link",route("front.rooms"))
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
                    <form action="{{ route("admin.page.rooms.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Rooms Heading *</label>
                            <input type="text" class="form-control" name="room_heading" value="{{ $room->room_heading }}">
                            @error("room_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Rooms Status *</label>
                            <div class="toggle-container">
                                <input @if($room->room_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="room_status" value="Yes">
                            </div>
                            @error("room_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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