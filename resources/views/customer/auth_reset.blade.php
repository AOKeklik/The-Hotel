@extends("front.layout.app")
@section("title",$provider_pages->customer_reset_heading)
@section("heading",$provider_pages->customer_reset_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
            @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif            
            <div class="col-4">
                <form action="{{ route("customer.reset.submit") }}" method="POST" class="login-form">
                    @csrf
                    @method("POST")    
                    <input type="hidden" name="token" value="{{ $token }}">                
                    <input type="hidden" name="email" value="{{ $email }}">                
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="text" class="form-control" name="password" value="">
                        @error("password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="confirm_password" value="">
                        @error("confirm_password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection