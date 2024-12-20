@include("admin.layout.header")
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Admin Panel Login</h4>
                                @if(Session::has("status")) <p class="alert alert-success p-1 text-center">{{ Session::get("status") }}</p> @endif
                                @if(Session::has("error"))<p class="alert alert-danger p-1 text-center">{{ Session::get("error") }}</p>@endif
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="{{ route("admin.login.submit") }}">
                                    @csrf
                                    @method("POST")
                                    <div class="form-group">
                                        <input type="email" class="form-control @error("email") is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
                                        @error("email") <p class="text-danger p-0">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error("password") is-invalid @enderror" name="password"  placeholder="Password">
                                        @error("password") <p class="text-danger p-0">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="{{ route("admin.forget") }}">
                                                Forget Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@include("admin.layout.footer")