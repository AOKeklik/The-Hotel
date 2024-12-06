@extends("front.layout.app")
@section("title",$provider_pages->cart_heading)
@section("heading",$provider_pages->cart_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
                @if(Session::has("cart"))
                    <div class="table-responsive">
                        @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                        @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                        <table class="table table-bordered table-cart">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Serial</th>
                                    <th>Photo</th>
                                    <th>Room Name</th>
                                    <th>Price/Night</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Guests</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Session::get("cart") as $cart)
                                    <tr>
                                        <td>
                                            <a href="{{ route("front.cart.item.delete",["item_id"=>$cart["cart_room_id"]]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td>{{ $cart["cart_room_id"] }}</td>
                                        <td><img src="{{ asset("uploads/room/thumbnail/") }}/{{ $cart['cart_room_photo'] }}"></td>
                                        <td>
                                            <a href="room-detail.html" class="room-name">{{ $cart["cart_room_name"] }}</a>
                                        </td>
                                        <td>${{ $cart["cart_room_price"] }}</td>
                                        <td>{{ $cart["cart_checkin"] }}</td>
                                        <td>{{ $cart["cart_checkout"] }}</td>
                                        <td>
                                            Adult: {{ $cart["cart_adult"] }}<br>
                                            Children: {{ $cart["cart_children"] }}
                                        </td>
                                        <td>${{ $cart["cart_subtotal"] }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8" class="tar">Total:</td>
                                    <td>${{ array_sum(array_column(Session::get("cart"),"cart_subtotal")) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                    <div class="checkout mb_20">
                        <a href="checkout.html" class="btn btn-primary bg-website">Checkout</a>
                    </div>
                @else
                    <p class="alert alert-info text-center">Your cart is empty!</p>                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection