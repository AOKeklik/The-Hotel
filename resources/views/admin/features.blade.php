@extends("admin.layout.app")
@section("title", "Features")
@section("heading", "Features")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.feature.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Feature</a>
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
                                <th>Icon</th>
                                <th>Heading</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $feature)
                                    <tr>
                                        <td>{{ $feature->id }}</td>
                                        <td>
                                            <div class="icon-admin"><i class="{{ $feature->icon }}"></i></div>
                                        </td>
                                        <td>{{ $feature->heading }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.feature.edit", ["feature_id" => $feature->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.feature.delete", ["feature_id" => $feature->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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