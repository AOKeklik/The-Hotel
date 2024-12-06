@extends("front.layout.app")
@section("title",$room->name)
@section("heading",$room->name)
@section("content")
<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">
                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url({{ asset("uploads/room/$room->featured_photo") }});">
                        <div class="bg"></div>
                    </div>
                    @foreach($room->roomPhotos as $roomPhoto)
                        <div class="item" style="background-image:url({{ asset("uploads/room-gallery/$roomPhoto->photo") }});">
                            <div class="bg"></div>
                        </div>
                    @endforeach
                </div>
                <div class="description">{!! $room->description !!}</div>
                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($amenities as $amenity)
                            <div class="col-lg-6 col-md-12">
                                <div class="item"><i class="fa fa-check-circle"></i> {{ $amenity->name }}</div>
                            </div>                          
                        @endforeach
                    </div>
                </div>
                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $room->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $room->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $room->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $room->total_balconies }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @if(!is_null($room->video_id))
                    <div class="video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">
                @if(Session::has("status")) <p class="alert alert-seccess">{{ Session::get("status") }}</p> @endif
                <div class="sidebar-container" id="sticky_sidebar">
                    <form action="{{ route("front.cart.submit") }}" method="post">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="widget">
                            <h2>Room Price per Night</h2>
                            <div class="price">
                                ${{ $room->price }}
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Reserve This Room</h2>
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="05/06/2022 - 06/06/2022">
                                @error("checkin_checkout") <p class="text-danger m-0">{{ $message }}</p> @endif
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                                @error("adult") <p class="text-danger m-0">{{ $message }}</p> @endif
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                                @error("children") <p class="text-danger m-0">{{ $message }}</p> @endif
                            </div>
                            <button type="submit" class="book-now">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection