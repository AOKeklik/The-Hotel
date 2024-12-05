@extends("front.layout.app")
@section("title", $provider_pages->customer_login_heading)
@section("heading", $provider_pages->customer_login_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has("status")) <p class="alert alert-success p-1 text-center">{{ Session::get("status") }}</p>  @endif
            @if(Session::has("error")) <p class="alert alert-danger p-1 text-center">{{ Session::get("error") }}</p> @endif
            <div class="col-4">
                <form method="POST" action="{{ route("customer.login.submit") }}" class="login-form">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{ old("email") }}">
                        @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old("password") }}">
                        @error("password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Login</button>
                        <a href="{{ route("customer.forget") }}" class="primary-color">Forget Password?</a>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route("customer.signup") }}" class="primary-color">New User? Make Registration</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection