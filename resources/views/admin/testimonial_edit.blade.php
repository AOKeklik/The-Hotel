@extends("admin.layout.app")
@section("title","Edit Testimonial")
@section("heading","Edit Testimonial")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.testimonials") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Testimonials</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.testimonial.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                            @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ $testimonial->designation }}">
                            @error("designation") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
                            @error("comment") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="{{ asset("uploads/testimonial/thumbnail") }}/{{ $testimonial->photo }}" alt="" style="width:9rem;display:block;padding:1rem">
                            <div>
                                <input type="file" name="photo">
                            </div>
                            @error("photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection