@extends("front.layout.app")
@section("title","User Signup")
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="{{ route("customer.signup.submit") }}" method="POST" class="login-form">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                        @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{ old("email") }}">
                        @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                        @error("password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" value="">
                        @error("confirm_password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route("customer.login") }}" class="primary-color">Existing User? Login Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection