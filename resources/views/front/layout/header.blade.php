<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>@yield("title", "Hotel Website")</title>        
		
        <link rel="icon" type="image/png" href="{{ asset("uploads/setting/$provider_setting->favicon") }}">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/iziToast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/style.css') }}">
        
        <!-- All Javascripts -->
        <script src="{{ asset('dist-front/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/wow.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/select2.full.js') }}"></script>
        <script src="{{ asset('dist-front/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/acmeticker.js') }}"></script>
        <script src="{{ asset('dist-front/js/moment.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/daterangepicker.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/sticky_sidebar.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('dist-front/js/iziToast.min.js') }}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $provider_setting->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $provider_setting->analytic_id }}');
        </script>

        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .home-feature .inner .icon i,
            .home-rooms .inner .text .price,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: #{{ $provider_setting->theme_color_1 }};
            }

            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color {
                color: #{{ $provider_setting->theme_color_1 }}!important;
            }

            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .room-detail .right .widget .book-now {
                background-color: #{{ $provider_setting->theme_color_1 }};
            }

            .slider .text .button a,
            .search-section button[type="submit"],
            .home-rooms .big-button a,
            .bg-website {
                background-color: #{{ $provider_setting->theme_color_1 }}!important;
            }

            .slider .text .button a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: #{{ $provider_setting->theme_color_1 }}!important;
            }

            .home-feature .inner .icon i,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail .amenity .item,
            .cart .table-cart tr th {
                background-color: #{{ $provider_setting->theme_color_2 }}!important;
            }
        </style>

    </head>
    <body>