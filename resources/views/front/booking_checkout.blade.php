@extends("front.layout.app")
@section("title",$provider_pages->checkout_heading)
@section("heading",$provider_pages->checkout_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 checkout-left">
                <form action="{{ route("front.checkout.submit") }}" method="post" class="frm_checkout">
                    @csrf
                    @method("POST")
                    <div class="billing-info">
                        <h4 class="mb_30">Billing Information</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                                @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Email Address:</label>
                                <input type="text" class="form-control" name="email" value="{{ $customer->email }}">
                                @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Phone Number:</label>
                                <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                                @error("phone") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Country:</label>
                                <input type="text" class="form-control" name="country" value="{{ $customer->country }}">
                                @error("country") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                                @error("address") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">State:</label>
                                <input type="text" class="form-control" name="state" value="{{ $customer->state }}">
                                @error("state") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">City:</label>
                                <input type="text" class="form-control" name="city" value="{{ $customer->city }}">
                                @error("city") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Zip Code:</label>
                                <input type="text" class="form-control" name="zip" value="{{ $customer->zip }}">
                                @error("zip") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-website mb_30">Continue to payment</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach(Session::get("cart") as $cart)
                                    <tr>
                                        <td>
                                            {{ $cart->cart_room_name }}
                                            <br>
                                            ({{ $cart->cart_checkin }} - {{ $cart->cart_checkout }})
                                            <br>
                                            Adult: {{ $cart->cart_adult }}, Children: {{ $cart->cart_children }}
                                        </td>
                                        <td class="p_price">${{ $cart->cart_subtotal }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>${{ array_sum(array_column(Session::get("cart"), "cart_subtotal")) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection