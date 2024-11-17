@extends("admin.layout.app")
@section("title","Add Post")
@section("heading","Add Post")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.posts") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Posta</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.post.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ old("heading") }}">
                            @error("heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Content</label>
                            <textarea name="short_content" class="form-control h_100" cols="30" rows="10">{{ old("short_content") }}</textarea>
                            @error("short_content") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Content</label>
                            <textarea name="content" class="form-control snote" cols="30" rows="10">{{ old("content") }}</textarea>
                            @error("content") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="" alt="" class="profile-photo w_100_p">
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

            if (files.length === 0) return
            
            img.setAttribute("src", URL.createObjectURL(files[0]))
        }
    </script>
@endpush