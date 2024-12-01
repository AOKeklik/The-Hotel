@extends("admin.layout.app")
@section("title","Testimonials")
@section("heading","Testimonials")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.testimonial.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Testimonial</a>
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
                        @if(Session::has("error"))  <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>
                                            <img src="{{ asset("uploads/testimonial/thumbnail") }}/{{ $testimonial->photo }}" alt="" />                                          
                                        </td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.testimonial.edit", ["testimonial_id" => $testimonial->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.testimonial.delete", ["testimonial_id" => $testimonial->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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