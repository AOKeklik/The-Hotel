@extends("admin.layout.app")
@section("title","Order")
@section("heading","Order")
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
                    @if(Session::has("status")) <p class="alert alert-success p-1 text-center">{{ Session::get("status") }}</p> @endif
                    @if(Session::has("error")) <p class="alert alert-danger p-1 text-center">{{ Session::get("error") }}</p> @endif                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Customer</th>
                                <th>Order No</th>
                                <th>Transaction Id</th>
                                <th>Payment Method</th>
                                <th>Card Last Digit</th>
                                <th>Paid Amount</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->order_no }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->card_last_digit }}</td>
                                        <td>{{ number_format($order->paid_amount,2,".","") }} PLN</td>
                                        <td>{{ $order->booking_date }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.order", ["order_id"=>$order->id]) }}" class="btn btn-primary">Detail</a>
                                            <a href="{{ route("admin.order.delete",["order_id"=>$order->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection