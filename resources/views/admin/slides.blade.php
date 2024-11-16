@extends("admin.layout.app")
@section("title","Slides")
@section("heading", "Slides")
@section("add_button")
    <div class="ml-auto">
        <a href="{{ route("admin.slide.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Slide</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                        @if (Session::has("error")) <p class="alert alert-danger p-1 text-white">{{ Session::get("error") }}</p> @endif
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($slides as $slide) 
                                    <tr>
                                        <td>{{ $slide->id }}</td>
                                        <td><img src="{{ asset("uploads/slide") }}/{{ $slide->photo }}" alt="" class="w_200" /></td>
                                        <td>{{ $slide->heading }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.slide.edit", ["slide_id" => $slide->id]) }}" class="btn btn-primary text-white">Edit</a>
                                            <form method="POST" action="{{ route("admin.slide.delete") }}" style="display:inline-block">
                                                @csrf
                                                @method("DELETE")
                                                <input type="hidden" name="slide_id" value="{{ $slide->id }}">
                                                <button type="submit" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</button>
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