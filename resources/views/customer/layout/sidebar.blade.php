<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Customer Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="@if(Request::is("customer")) active @endif"><a class="nav-link" href="{{ route("customer.index") }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class="@if(Route::is("customer.orders")) active @endif"><a class="nav-link" href="{{ route("customer.orders") }}"><i class="fas fa-hand-point-right"></i> Orders</a></li>



            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>