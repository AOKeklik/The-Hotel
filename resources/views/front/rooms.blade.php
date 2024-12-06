@extends("front.layout.app")
@section("title",$provider_pages->room_heading)
@section("heading",$provider_pages->room_heading)
@section("content")
<div class="home-rooms">
    <div class="container">
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset("uploads/room/$room->featured_photo") }}" alt="{{ $room->name }}">
                        </div>
                        <div class="text">
                            <h2><a href="">{{ $room->name }}</a></h2>
                            <div class="price">
                                ${{ $room->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route("front.room",["room_id"=>$room->id]) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">{{ $rooms->links("pagination::bootstrap-5") }}</div>
        </div>
    </div>
</div>
@endsection