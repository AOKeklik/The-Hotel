@include("customer.layout.header")

<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="nav-link">
                    <a href="{{ route("front.index") }}" target="_blank" class="btn btn-warning">Front End</a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        @if(Auth::guard("customer")->user()->photo)
                            <img alt="image" src="{{ asset("uploads/customer") }}/{{ Auth::guard('customer')->user()->photo }}" class="rounded-circle mr-1">
                        @else
                            <img alt="image" src="{{ asset("uploads/user.png") }}" class="rounded-circle mr-1">
                        @endif
                        <div class="d-sm-none d-lg-inline-block">{{ Auth::guard("customer")->user()->name }}</div></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route("customer.profile.edit") }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Edit Profile
                        </a>
                        <a href="{{ route("customer.logout") }}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        
        @include("customer.layout.sidebar")

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield("heading","Dashboard")</h1>
                    @yield("button")
                </div>
                @yield("content")
            </section>
        </div>

    </div>
</div>

@include("customer.layout.footer")