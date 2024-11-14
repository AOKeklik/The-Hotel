@include("admin.layout.header")
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Reset Password</h4>
                                @if(Session::has("error")) <p class="text-danger m-0">{{ Session::get("error") }}</p> @endif
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="{{ route('admin.login.reset.submit') }}">
                                    @csrf
                                    @method("POST")
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <input type="hidden" name="token" value="{{ request()->route("token") }}">
                                    @error("email") <p class="text-danger">{{ $message }}</p> @enderror
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('password_current') is-invalid @enderror" name="password_current" placeholder="Current Password" value="{{ old('password_current') }}" autofocus>
                                        @error("password_current") <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('password_new') is-invalid @enderror" name="password_new" placeholder="New Password" value="{{ old('password_new') }}" autofocus>
                                        @error("password_new") <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" placeholder="Confirm Password" value="{{ old('password_confirm') }}" autofocus>
                                        @error("password_confirm") <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="{{ route("admin.login") }}">
                                                Back to login page
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