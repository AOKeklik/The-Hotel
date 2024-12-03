@extends("admin.layout.app")
@section("title","Customer Page Edit")
@section("heading","Customer Page Edit")
@section("link",route("customer.login"))
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
                    @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif 
                    @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif                     
                    <form action="{{ route("admin.page.customer.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT") 
                        <div class="form-group mb-3">
                            <label>Customer Login Heading *</label>
                            <input type="text" class="form-control" name="customer_login_heading" value="{{ $customer->customer_login_heading }}">
                            @error("customer_login_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Customer Signup Heading *</label>
                            <input type="text" class="form-control" name="customer_signup_heading" value="{{ $customer->customer_signup_heading }}">
                            @error("customer_signup_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Customer Forget Heading *</label>
                            <input type="text" class="form-control" name="customer_forget_heading" value="{{ $customer->customer_forget_heading }}">
                            @error("customer_forget_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Customer Signup Status *</label>
                            <div class="toggle-container">
                                <input @if($customer->customer_signup_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="customer_signup_status" value="Yes">
                            </div>
                            @error("customer_signup_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Customer Login Status *</label>
                            <div class="toggle-container">
                                <input @if($customer->customer_login_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="customer_login_status" value="Yes">
                            </div>
                            @error("customer_login_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection