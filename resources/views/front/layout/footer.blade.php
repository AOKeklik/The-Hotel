        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Site Links</h2>
                            <ul class="useful-links">
                                <li><a href="rooms.html">Rooms & Suites</a></li>
                                @if($provider_pages->photo_status == 1)
                                    <li><a href="{{ route("front.photos") }}">{{ $provider_pages->photo_heading }}</a></li>
                                @endif
                                @if($provider_pages->blog_status == 1)
                                    <li><a href="{{ route("front.blog") }}">{{ $provider_pages->blog_heading }}</a></li>
                                @endif
                                @if($provider_pages->contact_status == 1)
                                    <li><a href="{{ route("front.contact") }}">{{ $provider_pages->contact_heading }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route("front.index") }}">Home</a></li>
                                @if($provider_pages->terms_status == 1)
                                    <li><a href="{{ route("front.terms") }}">{{ $provider_pages->terms_heading }}</a></li>
                                @endif
                                @if($provider_pages->policy_status == 1)
                                    <li><a href="{{ route("front.policy") }}">{{ $provider_pages->policy_heading }}</a></li>
                                @endif
                                @if($provider_pages->faq_status == 1)
                                    <li><a href="{{ route("front.faq") }}">{{ $provider_pages->faq_heading }}</a></li>
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
                            <form>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control">
                                    <p class="text-danger m-0 alert-error-email"></p>
                                    <p class="text-success m-0 alert-success-email"></p>
                                </div>
                                <div class="form-group">
                                    <input onclick="handlerSubmitSubscriberForm(event)" type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copyright"> Copyright 2022, ArefinDev. All Rights Reserved.</div>
        <div class="scroll-top"> <i class="fa fa-angle-up"></i> </div>
        <div id="loader"></div>
        <script src="{{ asset('dist-front/js/custom.js') }}"></script>        
        <script>
            function handlerSubmitSubscriberForm (e) {
                e.preventDefault()
    
                const form = e.target.closest("form")
                const email = form.querySelector("input[name=email]")
                const loader = document.getElementById("loader")
    
                if (!email) return
    
                const formData = new FormData()
                formData.append("_token", "{{ csrf_token() }}")
                formData.append("email",email.value.trim())

                email.value = ''
                loader.style.display = "block"    
                email.nextElementSibling.innerHTML = ''            
    
                $.ajax({
                    url: "{{ route('front.subscriber.submit') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: data => {
                        
                        // console.log(data)
                        loader.style.display = "none"
                        
                        if (data.ok === false)
                            Object.keys(data.error_message).forEach(msg => {
                                message = document.querySelector(".alert-error-"+msg)
                                if (!message) return
                                message.textContent = data.error_message[msg]
                            })
    
                        if (data.ok === true) {
                            message = document.querySelector(".alert-success-email")
                            message.textContent = data.message
                        }    
                    }
                })
            }
        </script>
        @stack("scripts")
    </body>
</html>
