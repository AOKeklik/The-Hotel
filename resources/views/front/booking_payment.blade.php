@extends("front.layout.app")
@section("title",$provider_pages->payment_heading)
@section("heading",$provider_pages->payment_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-lg-8 col-md-6 checkout-left mb_30">
                <div class="row gap-3">
                    <div class="col-12">
                        <h4>Make Payment</h4>
                        <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                            <option value="">Select Payment Method</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Stripe">Stripe</option>
                        </select>

                        <div class="paypal mt_20">
                            <h4>Pay with PayPal</h4>
                            <p>Write necessary code here</p>
                        </div>

                        <div class="stripe mt_20">
                            <h4>Pay with Stripe</h4>
                            <p>Write necessary code here</p>
                        </div>
                    </div>
                    <div class="col-12 checkout-right">
                        <div class="inner">
                            <h4 class="mb_10">Billing Details</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Name:</strong> 
                                                {{ $billing->name }}
                                            </td>
                                            <td> 
                                                <strong>Email:</strong>
                                                {{ $billing->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Phone:</strong>
                                                {{ $billing->phone }}
                                            </td>
                                            <td>
                                                <strong>Country:</strong>
                                                {{ $billing->country }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Address:</strong>
                                                {{ $billing->address }}
                                            </td>
                                            <td>
                                                <strong>State:</strong>
                                                {{ $billing->state }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>City:</strong>
                                                {{ $billing->city }}
                                            </td>
                                            <td>
                                                <strong>Zip:</strong>
                                                {{ $billing->zip }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <td class="p_price"><b>${{ array_sum(array_column(Session::get("cart"),"cart_subtotal")) }}</b></td>
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