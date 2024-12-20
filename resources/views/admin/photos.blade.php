@extends("admin.layout.app")
@section("title","Photos")
@section("link",route("front.photos"))
@section("heading","Photos")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.photo.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Photo</a>
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
                                <th>Image</th>
                                <th>Caption</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($photos as $photo)
                                    <tr>
                                        <td>{{ $photo->id }}</td>
                                        <td>
                                            <img src="{{ asset("uploads/photo/thumbnail/$photo->photo") }}" alt="">
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.photo.edit", ["photo_id" => $photo->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.photo.delete", ["photo_id" => $photo->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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