@extends("customer.layout.app")
@section("title","Order Invoice")
@section("heading","Order Invoice")
@section("button")
<div class="ml-auto">
    <a href="{{ route("customer.orders") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Orders</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order #{{ $order->order_no }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Invoice To</strong><br>
                                {{ $order->customer->name }}<br>
                                {{ $order->customer->address }},<br>
                                {{ $order->customer->city }}, {{ $order->customer->state }}, {{ $order->customer->country }}, {{ $order->customer->zip }}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Invoice Date</strong><br>
                                {{ ucfirst(\Carbon\Carbon::createFromFormat("d/m/Y", $order->booking_date)->translatedFormat("F d,Y")) }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Hotel room information are given below in detail </p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Room Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Checkin & Checkout</th>
                                <th class="text-center">Number of adults</th>
                                <th class="text-center">Number of childs</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            @foreach($order->orderDetails as $detail)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $detail->room->name }}</td>
                                    <td class="text-center">{{ $detail->room->price }} PLN</td>
                                    <td class="text-center">{{ $detail->checkin_date }}--{{ $detail->checkout_date }}</td>
                                    <td class="text-center">{{ $detail->adult }}</td>
                                    <td class="text-center">{{ $detail->children }}</td>
                                    <td class="text-right">{{ $detail->subtotal }} PLN</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">{{ number_format($order->paid_amount,2,".","") }} PLN</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection