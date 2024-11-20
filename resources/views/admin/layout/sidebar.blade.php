<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="@if(Route::is("admin.index")) active @endif"><a class="nav-link" href="{{ route('admin.index') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown @if(Request::is("admin/slides") || Request::is("admin/slide/add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Slides</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.slides")) active @endif"><a class="nav-link" href="{{ route("admin.slides") }}"><i class="fa fa-angle-right"></i> Slides</a></li>
                    <li class="@if(Route::is("admin.slide.add")) active @endif"><a class="nav-link" href="{{ route("admin.slide.add") }}"><i class="fa fa-angle-right"></i> Add Slide</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Request::is("admin/features") || Request::is("admin/feature/add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Features</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.features")) active @endif"><a class="nav-link" href="{{ route("admin.features") }}"><i class="fa fa-angle-right"></i> Features</a></li>
                    <li class="@if(Route::is("admin.feature.add")) active @endif"><a class="nav-link" href="{{ route("admin.feature.add") }}"><i class="fa fa-angle-right"></i> Add Feature</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Route::is("admin.testimonials") || Route::is("admin.testimonial.add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Testimonials</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.testimonials")) active @endif"><a class="nav-link" href="{{ route("admin.testimonials") }}"><i class="fa fa-angle-right"></i> Testimonials</a></li>
                    <li class="@if(Route::is("admin.testimonial.add")) active @endif"><a class="nav-link" href="{{ route("admin.testimonial.add") }}"><i class="fa fa-angle-right"></i> Add Testimonial</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Route::is("admin.posts") || Route::is("admin.post.add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Posts</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.posts")) active @endif"><a class="nav-link" href="{{ route("admin.posts") }}"><i class="fa fa-angle-right"></i> Posts</a></li>
                    <li class="@if(Route::is("admin.post.add")) active @endif"><a class="nav-link" href="{{ route("admin.post.add") }}"><i class="fa fa-angle-right"></i> Add Post</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Route::is("admin.photos") || Request::is("admin/photo/add") || Request::is("admin/videos") || Request::is("admin/video/add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Galeria</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.photos")) active @endif"><a class="nav-link" href="{{ route("admin.photos") }}"><i class="fa fa-angle-right"></i> Photos</a></li>
                    <li class="@if(Route::is("admin.photo.add")) active @endif"><a class="nav-link" href="{{ route("admin.photo.add") }}"><i class="fa fa-angle-right"></i> Add Photo</a></li>
                    <li class="@if(Route::is("admin.videos")) active @endif"><a class="nav-link" href="{{ route("admin.videos") }}"><i class="fa fa-angle-right"></i> Videos</a></li>
                    <li class="@if(Route::is("admin.video.add")) active @endif"><a class="nav-link" href="{{ route("admin.video.add") }}"><i class="fa fa-angle-right"></i> Add Video</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Route::is("admin.faqs") || Request::is("admin/faq/add")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Faqs</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Route::is("admin.faqs")) active @endif"><a class="nav-link" href="{{ route("admin.faqs") }}"><i class="fa fa-angle-right"></i> Faqs</a></li>
                    <li class="@if(Route::is("admin.faq.add")) active @endif"><a class="nav-link" href="{{ route("admin.faq.add") }}"><i class="fa fa-angle-right"></i> Add Faq</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown @if(Request::is("admin/page/*")) active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Pages</span></a>
                <ul class="dropdown-menu">

                <li class="@if(Route::is("admin.page.about.edit")) active @endif"><a class="nav-link" href="{{ route("admin.page.about.edit") }}"><i class="fa fa-angle-right"></i> About Page</a></li>
                <li class="@if(Route::is("admin.page.contact.edit")) active @endif"><a class="nav-link" href=""><i class="fa fa-angle-right"></i> Contact Page</a></li>
                <li class="@if(Route::is("admin.page.terms.edit")) active @endif"><a class="nav-link" href="{{ route("admin.page.terms.edit") }}"><i class="fa fa-angle-right"></i> Terms Page</a></li>
                
                </ul>
            </li>

            <li class=""><a class="nav-link" href="setting.html"><i class="fa fa-hand-o-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fa fa-hand-o-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fa fa-hand-o-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fa fa-hand-o-right"></i> <span>Invoice</span></a></li>

        </ul>
    </aside>
</div>