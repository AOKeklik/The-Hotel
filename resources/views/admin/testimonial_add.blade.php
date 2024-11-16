@extends("admin.layout.app")
@section("title","Add Testimonial")
@section("heading","Add Testimonial")
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
                    <form action="{{ route("admin.testimonial.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                            @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ old("designation") }}">
                            @error("designation") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ old("comment") }}</textarea>
                            @error("comment") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="" alt="" style="width:9rem;display:block;padding:1rem">
                            <div>
                                <input onchange="handlerChangeImage(event)" type="file" name="photo">
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
@push("scripts")
    <script>
        function handlerChangeImage (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const files = e.target.files

            if (!img) return
            if (files.length === 0) return

            img.setAttribute("src", URL.createObjectURL(files[0]))
        }
    </script>
@endpush