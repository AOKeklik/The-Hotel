<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{ route('admin.index') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Slides</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route("admin.slides") }}"><i class="fa fa-angle-right"></i> Slides</a></li>
                    <li class=""><a class="nav-link" href="{{ route("admin.slide.add") }}"><i class="fa fa-angle-right"></i> Add Slide</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Features</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route("admin.features") }}"><i class="fa fa-angle-right"></i> Features</a></li>
                    <li class=""><a class="nav-link" href="{{ route("admin.feature.add") }}"><i class="fa fa-angle-right"></i> Add Feature</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Testimonials</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route("admin.testimonials") }}"><i class="fa fa-angle-right"></i> Testimonials</a></li>
                    <li class=""><a class="nav-link" href="{{ route("admin.testimonial.add") }}"><i class="fa fa-angle-right"></i> Add Testimonial</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Posts</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route("admin.posts") }}"><i class="fa fa-angle-right"></i> Posts</a></li>
                    <li class=""><a class="nav-link" href="{{ route("admin.post.add") }}"><i class="fa fa-angle-right"></i> Add Post</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Photos</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route("admin.photos") }}"><i class="fa fa-angle-right"></i> Photos</a></li>
                    <li class=""><a class="nav-link" href="{{ route("admin.photo.add") }}"><i class="fa fa-angle-right"></i> Add Photo</a></li>
                </ul>
            </li>

            <li class=""><a class="nav-link" href="setting.html"><i class="fa fa-hand-o-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fa fa-hand-o-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fa fa-hand-o-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fa fa-hand-o-right"></i> <span>Invoice</span></a></li>

        </ul>
    </aside>
</div>