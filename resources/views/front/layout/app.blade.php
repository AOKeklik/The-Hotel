@include("front.layout.header")
        
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">111-222-3333</li>
                    <li class="email-text">contact@arefindev.com</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    @if($pages->cart_status == 1) 
                        <li class="menu"><a href="cart.html">{{ $pages->cart_title }}</a></li>
                    @endif
                    @if($pages->checkout_status == 1) 
                        <li class="menu"><a href="checkout.html">{{ $pages->checkout_title }}</a></li>
                    @endif
                    <li class="menu"><a href="signup.html">Sign Up</a></li>
                    <li class="menu"><a href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route("front.index") }}" class="logo">
            <img src="{{ asset("uploads") }}/logo.png" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route("front.index") }}">
                    <img src="{{ asset("uploads") }}/logo.png" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">        
                        <li class="nav-item">
                            <a href="{{ route("front.index") }}" class="nav-link">Home</a>
                        </li>
                        @if($pages->about_status == 1)
                            <li class="nav-item">
                                <a href="{{ route("front.about") }}" class="nav-link">{{ $pages->about_title }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Couple Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Regular Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Delux Double Bed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Premium Suite</a>
                                </li>
                            </ul>
                        </li>
                        @if ($pages->photo_status == 1 || $pages->video_status == 1)
                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                <ul class="dropdown-menu">
                                    @if ($pages->photo_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route("front.photos") }}" class="nav-link">{{ $pages->photo_title }}</a>
                                        </li>
                                    @endif
                                    @if ($pages->video_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route("front.videos") }}" class="nav-link">{{ $pages->video_title }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if($pages->blog_status == 1)
                            <li class="nav-item">
                                <a href="{{ route("front.blog") }}" class="nav-link">{{ $pages->blog_title }}</a>
                            </li>
                        @endif
                        @if($pages->contact_status == 1)
                            <li class="nav-item"><a href="{{ route("front.contact") }}" class="nav-link">{{ $pages->contact_title }}</a></li>
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