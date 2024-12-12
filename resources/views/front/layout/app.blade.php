@include("front.layout.header")
        
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">{{ $provider_setting->top_phono }}</li>
                    <li class="email-text">{{ $provider_setting->top_email }}</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    @if($provider_pages->cart_status == 1) 
                        <li class="menu"><a href="{{ route("front.cart") }}">{{ $provider_pages->cart_heading }} @if(Session::has("cart"))<sup>{{ count(Session::get("cart")) }}</sup>@endif</a></li>
                    @endif
                    @if($provider_pages->checkout_status == 1) 
                        <li class="menu"><a href="{{ route("front.checkout") }}">{{ $provider_pages->checkout_heading }}</a></li>
                    @endif
                    @if(Auth::guard("customer")->check())
                        <li class="menu"><a href="{{ route("customer.index") }}">Dashboard</a></li>
                    @else   
                        @if($provider_pages->customer_signup_status == 1)
                            <li class="menu"><a href="{{ route("customer.signup") }}">{{ $provider_pages->customer_signup_heading }}</a></li>
                        @endif
                        @if($provider_pages->customer_login_status == 1)
                            <li class="menu"><a href="{{ route("customer.login") }}">{{ $provider_pages->customer_login_heading }}</a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route("front.index") }}" class="logo">
            <img src="{{ asset("uploads/setting/$provider_setting->logo") }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route("front.index") }}">
                    <img src="{{ asset("uploads/setting/$provider_setting->logo") }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">        
                        <li class="nav-item">
                            <a href="{{ route("front.index") }}" class="nav-link">Home</a>
                        </li>
                        @if($provider_pages->about_status == 1)
                            <li class="nav-item">
                                <a href="{{ route("front.about") }}" class="nav-link">{{ $provider_pages->about_heading }}</a>
                            </li>
                        @endif
                        @if(count($provider_rooms) > 0)
                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                                <ul class="dropdown-menu">
                                    @foreach($provider_rooms as $provider_room)
                                        <li class="nav-item">
                                            <a href="{{ route("front.room",["room_id"=>$provider_room->id]) }}" class="nav-link">{{ $provider_room->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if ($provider_pages->photo_status == 1 || $provider_pages->video_status == 1)
                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                <ul class="dropdown-menu">
                                    @if ($provider_pages->photo_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route("front.photos") }}" class="nav-link">{{ $provider_pages->photo_heading }}</a>
                                        </li>
                                    @endif
                                    @if ($provider_pages->video_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route("front.videos") }}" class="nav-link">{{ $provider_pages->video_heading }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if($provider_pages->blog_status == 1)
                            <li class="nav-item">
                                <a href="{{ route("front.blog") }}" class="nav-link">{{ $provider_pages->blog_heading }}</a>
                            </li>
                        @endif
                        @if($provider_pages->contact_status == 1)
                            <li class="nav-item"><a href="{{ route("front.contact") }}" class="nav-link">{{ $provider_pages->contact_heading }}</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@if (!Route::is("front.index"))
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>@yield("heading")</h2>
                </div>
            </div>
        </div>
    </div>
@endif

@yield("content")        

@include("front.layout.footer")