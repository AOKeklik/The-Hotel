@extends("admin.layout.app")
@section("title","Customers")
@section("heading","Customers")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboards</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has("status")) <p class="alert alert-success p-1 text-center">{{ Session::get("status") }}</p> @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td><img src="{{ asset("uploads/customer/$customer->photo") }}" alt="" style="width:100px"></td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td class="pt_10 pb_10">
                                            <form action="{{ route("admin.customer.update.status", ["customer_id"=>$customer->id]) }}" class="form-group mb-3">
                                                <div class="toggle-container">
                                                    <input onchange="event.target.closest('form').submit()" @if($customer->status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Active" data-off="Pending" data-onstyle="success" data-offstyle="danger" name="" value="Yes" >
                                                </div>
                                            </form>
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