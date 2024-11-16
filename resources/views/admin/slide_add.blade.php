@extends("admin.layout.app")
@section("title", "Add Slide")
@section("heading", "Add Slide")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.slides") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Slides</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.slide.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ old("heading") }}">
                            @error("heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Text</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ old("text") }}</textarea>
                            @error("text") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Text Button</label>
                            <input type="text" class="form-control" name="button_text" value="{{ old("button_text") }}">
                            @error("button_text") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Url Button</label>
                            <input type="text" class="form-control" name="button_url" value="{{ old("button_url") }}">
                            @error("button_url") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="" alt="" class="profile-photo w_100_p">
                            <div>
                                <input type="file" name="photo" onchange="handlerChangePhoto(event)">
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
        function handlerChangePhoto (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const files = e.target.files

            if (files.lehngth === 0) return 

            img.setAttribute("src", URL.createObjectURL(files[0]))            
        }
    </script>
@endpush