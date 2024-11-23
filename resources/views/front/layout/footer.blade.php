        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Site Links</h2>
                            <ul class="useful-links">
                                <li><a href="rooms.html">Rooms & Suites</a></li>
                                @if($pages->photo_status == 1)
                                    <li><a href="{{ route("front.photos") }}">{{ $pages->photo_title }}</a></li>
                                @endif
                                @if($pages->blog_status == 1)
                                    <li><a href="{{ route("front.blog") }}">{{ $pages->blog_title }}</a></li>
                                @endif
                                @if($pages->contact_status == 1)
                                    <li><a href="{{ route("front.contact") }}">{{ $pages->contact_title }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route("front.index") }}">Home</a></li>
                                @if($pages->terms_status == 1)
                                    <li><a href="{{ route("front.terms") }}">{{ $pages->terms_title }}</a></li>
                                @endif
                                @if($pages->policy_status == 1)
                                    <li><a href="{{ route("front.policy") }}">{{ $pages->policy_title }}</a></li>
                                @endif
                                @if($pages->faq_status == 1)
                                    <li><a href="{{ route("front.faq") }}">{{ $pages->faq_title }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="right">
                                    34 Antiger Lane,<br>
                                    PK Lane, USA, 12937
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="right">
                                    contact@arefindev.com
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="right">
                                    122-222-1212
                                </div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news and other great items, please subscribe us here: 
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="copyright"> Copyright 2022, ArefinDev. All Rights Reserved.</div>

        <div class="scroll-top"> <i class="fa fa-angle-up"></i> </div>

        <script src="{{ asset('dist-front/js/custom.js') }}"></script>        
        @stack("scripts")
    </body>
</html>