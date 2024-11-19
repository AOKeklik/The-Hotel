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
                    <li class="menu"><a href="cart.html">Cart</a></li>
                    <li class="menu"><a href="checkout.html">Checkout</a></li>
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
                        <li class="nav-item">
                            <a href="{{ route("front.about") }}" class="nav-link">About</a>
                        </li>
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
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route("front.photos") }}" class="nav-link">Photo Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("front.videos") }}" class="nav-link">Video Gallery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("front.blog") }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
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