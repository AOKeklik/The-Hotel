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
                @yield("button")
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">John Doe</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="profile.html" class="dropdown-item has-icon">
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
                </div>
                @yield("content")
            </section>
        </div>

    </div>
</div>

@include("customer.layout.footer")