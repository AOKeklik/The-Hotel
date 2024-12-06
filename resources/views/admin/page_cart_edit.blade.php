@extends("admin.layout.app")
@section("title","Edit Cart")
@section("heading","Edit Cart")
@section("link",route("front.cart"))
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
                    <form action="{{ route("admin.page.cart.update") }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label>Cart Heading</label>
                            <input type="text" class="form-control" name="cart_heading" value="{{ $cart->cart_heading }}">
                            @error("cart_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Cart Status</label>
                            <div class="toggle-container">
                                <input @if($cart->cart_status) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="cart_status" value="Yes">
                            </div>
                            @error("cart_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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