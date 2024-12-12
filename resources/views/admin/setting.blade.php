@extends("admin.layout.app")
@section("title","Edit Section")
@section("heading","Edit Section")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboard</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">  
                <div class="card-body">
                    @if(Session::has("status"))<p class="alert alert-success p-0 text-center">{{ Session::get("status") }}</p> @endif
                    @if(Session::has("error"))<p class="alert alert-danger p-0 text-center">{{ Session::get("error") }}</p> @endif
                    <form action="{{ route("admin.setting.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row" style="background-color: #f3f4ff">
                            <div class="col-md-3 align-content-center">
                                <div class="form-group mb-3">
                                    <label>Favicon *</label>
                                    @if(empty($setting->favicon))
                                        <figure style="display: none;">
                                            <img src="{{ asset("uploads/setting/$setting->favicon") }}" style="width:30px;height:30px" alt="">
                                        </figure>
                                    @else
                                        <figure>
                                            <img src="{{ asset("uploads/setting/$setting->favicon") }}" style="width:30px;height:30px" alt="">
                                        </figure>
                                    @endif
                                    <div>
                                        <input onchange="handlerChangeImage(event)" type="file" name="favicon">
                                    </div>
                                    @error("favicon") <p class="text-danger p-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Top Phono</label>
                                            <input type="text" class="form-control" name="top_phono" value="{{ $setting->top_phono }}">
                                            @error("top_phono") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                        </div>                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Top Email</label>
                                            <input type="text" class="form-control" name="top_email" value="{{ $setting->top_email }}">
                                            @error("top_email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 align-content-center">
                                <div class="form-group mb-6">
                                    <label>Logo *</label>
                                    @if(empty($setting->logo))
                                        <figure style="display: none;">
                                            <img src="{{ asset("uploads/setting/$setting->logo") }}"  style="width:200px;height:60px" alt="">
                                        </figure>
                                    @else
                                        <figure>
                                            <img src="{{ asset("uploads/setting/$setting->logo") }}"  style="width:200px;height:60px" alt="">
                                        </figure>
                                    @endif
                                    <div>
                                        <input onchange="handlerChangeImage(event)" type="file" name="logo">
                                    </div>
                                    @error("logo") <p class="text-danger p-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Address</label>
                                    <input type="text" class="form-control" name="footer_address" value="{{ $setting->footer_address }}">
                                    @error("footer_address") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Email</label>
                                    <input type="text" class="form-control" name="footer_email" value="{{ $setting->footer_email }}">
                                    @error("footer_email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Phone</label>
                                    <input type="text" class="form-control" name="footer_phone" value="{{ $setting->footer_phone }}">
                                    @error("footer_phone") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Copyright</label>
                                    <input type="text" class="form-control" name="footer_copyright" value="{{ $setting->footer_copyright }}">
                                    @error("footer_copyright") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 align-content-end">
                                <div class="form-group mb-3">
                                    <label>Footer Facebook</label>
                                    <input type="text" class="form-control" name="footer_facebook" value="{{ $setting->footer_facebook }}">
                                    @error("footer_facebook") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Twitter</label>
                                    <input type="text" class="form-control" name="footer_twitter" value="{{ $setting->footer_twitter }}">
                                    @error("footer_twitter") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Pinterest</label>
                                    <input type="text" class="form-control" name="footer_pinterest" value="{{ $setting->footer_pinterest }}">
                                    @error("footer_pinterest") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Linkedin</label>
                                    <input type="text" class="form-control" name="footer_linkedin" value="{{ $setting->footer_linkedin }}">
                                    @error("footer_linkedin") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Footer Instagram</label>
                                    <input type="text" class="form-control" name="footer_instagram" value="{{ $setting->footer_instagram }}">
                                    @error("footer_instagram") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>           
                        
                        <div class="row" style="background-color: #f3f4ff">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Color 1</label>
                                    <input type="text" class="form-control jscolor" name="theme_color_1" value="{{ $setting->theme_color_1 }}">
                                    @error("theme_color_1") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Color 2</label>
                                    <input type="text" class="form-control jscolor" name="theme_color_2" value="{{ $setting->theme_color_2 }}">
                                    @error("theme_color_2") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Analytic Id</label>
                                    <input type="text" class="form-control" name="analytic_id" value="{{ $setting->analytic_id }}">
                                    @error("analytic_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>Home Feature Status *</label>
                                    <div class="toggle-container">
                                        <input @if($setting->home_feature_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="home_feature_status" value="Yes">
                                    </div>
                                    @error("home_feature_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <label>Home Feature Simit</label>
                                    <input type="text" class="form-control" name="home_feature_limit" value="{{ $setting->home_feature_limit }}">
                                    @error("home_feature_limit") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row" style="background-color: #f3f4ff">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>Home Room Status *</label>
                                    <div class="toggle-container">
                                        <input @if($setting->home_room_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="home_room_status" value="Yes">
                                    </div>
                                    @error("home_room_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <label>Home Room Limit</label>
                                    <input type="text" class="form-control" name="home_room_limit" value="{{ $setting->home_room_limit }}">
                                    @error("home_room_limit") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Home Testimonial Status *</label>
                            <div class="toggle-container">
                                <input @if($setting->home_testimonial_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="home_testimonial_status" value="Yes">
                            </div>
                            @error("home_testimonial_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>

                        <div class="row" style="background-color: #f3f4ff">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>Home Post Status *</label>
                                    <div class="toggle-container">
                                        <input @if($setting->home_post_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="home_post_status" value="Yes">
                                    </div>
                                    @error("home_post_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <label>Home Post Limit</label>
                                    <input type="text" class="form-control" name="home_post_limit" value="{{ $setting->home_post_limit }}">
                                    @error("home_post_limit") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>        
                        <div class="form-group p-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script>
        function handlerChangeImage (e) {
            const parent = e.target.closest('.form-group.mb-3')
            const imgs = parent.querySelectorAll("img")
            const files = e.target.files

            if(files.length === 0) return

            imgs.forEach(img => {
                img.setAttribute("src", URL.createObjectURL(files[0]))
                img.parentElement.style.display = "block"
            })
        }
    </script>
@endpush