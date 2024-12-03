@extends("front.layout.app")
@section("title","Forget Passwsord")
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="{{ route("customer.reset.submit") }}" class="login-form">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="">
                        @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                        <a href="{{ route("customer.login") }}" class="primary-color">Back to Login Page</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection