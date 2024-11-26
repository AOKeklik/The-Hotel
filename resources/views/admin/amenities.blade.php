@extends("admin.layout.app")
@section("title","Aminities")
@section("heading","Aminities")
@section("link",route("front.index"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.hotel.amenity.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Aminity</a>
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($amenities as $amenity)
                                    <tr>
                                        <td>{{ $amenity->id }}</td>
                                        <td>{{ $amenity->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.hotel.amenity.edit", ["amenity_id" => $amenity->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.hotel.amenity.delete", ["amenity_id"=> $amenity->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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