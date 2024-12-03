@extends("front.layout.app")
@section("title",$provider_pages->customer_forget_heading)
@section("heading",$provider_pages->customer_forget_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
            @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
            <div class="col-4">
                <form method="POST" action="{{ route("customer.forget.submit") }}" class="login-form">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{ old("email") }}">
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