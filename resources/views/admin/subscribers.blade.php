@extends("admin.layout.app")
@section("title","Edit Subscribers")
@section("heading","Edit Subscribers")
@section("link",route("front.index"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.subscribers") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Subscribers</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                        @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $subscriber->id }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>{{ $subscriber->status }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.subscriber.edit", ["subscriber_id"=>$subscriber->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.subscriber.delete", ["subscriber_id"=>$subscriber->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="{{ route("admin.subscriber.email") }}" class="btn btn-primary"><i class="fa fa-envelope"></i> Send Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection