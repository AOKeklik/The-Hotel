@extends("front.layout.app")
@section("title", "Hotel Website")
@section("content")
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($slides as $slide)
            <div class="item" style="background-image:url({{ asset("uploads/slide") }}/{{ $slide->photo }});">
                <div class="bg"></div>
                <div class="text">
                    <h2>{{ $slide->heading }}</h2>
                    <p>{{ $slide->text }}</p>
                    @if(!empty($slide->button_text))
                        <div class="button">
                            <a href="{{ $slide->button_url }}"> {{ $slide->button_text }}</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>             
    
<div class="search-section">
    <div class="container">
        <form action="cart.html" method="post">
        <div class="inner">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <select name="" class="form-select">
                            <option value="">Select Room</option>
                            <option value="">Standard Couple Bed Room</option>
                            <option value="">Delux Couple Bed Room</option>
                            <option value="">Standard Four Bed Room</option>
                            <option value="">Delux Four Bed Room</option>
                            <option value="">VIP Special Room</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" name="" class="form-control" min="1" max="30" placeholder="Adults">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" name="" class="form-control" min="1" max="30" placeholder="Children">
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="home-feature">
    <div class="container">
        <div class="row">
            @foreach($features as $feature)
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="{{$feature->icon}}"></i></div>
                        <div class="text">
                            <h2>{{$feature->heading}}</h2>
                            <p>{{ $feature->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>        

<div class="home-rooms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Rooms and Suites</h2>
            </div>
        </div>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset("uploads/room/$room->featured_photo") }}" alt="">
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
            <div class="col-md-12">
                <div class="big-button">
                    <a href="{{ route("front.rooms") }}" class="btn btn-primary">See All Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial" style="background-image: url(uploads/testimonial-back.jpg)">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Our Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset("uploads/testimonial/{$testimonial->photo}") }}" alt="">
                            </div>
                            <div class="text">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                            <div class="description">
                                <p>{{ $testimonial->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Latest Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset("uploads/post/$post->photo") }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route("front.blog.detail", ["post_id" => $post->id]) }}">{{ $post->heading }}</a></h2>
                            <div class="short-des">
                                <p>{{ $post->short_content }}</p>
                            </div>
                            <div class="button">
                                <a href="{{ route("front.blog.detail", ["post_id" => $post->id]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection



        