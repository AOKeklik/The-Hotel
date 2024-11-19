@extends("admin.layout.app")
@section("title","Add Photo")
@section("link",route("front.photos"))
@section("heading","Add Photo")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.photos") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Photos</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.photo.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <input type="text" class="form-control" name="caption" value="{{old("caption")}}">
                            @error("caption") <p class="text-danger m-0">{{ $message }}</p> @endError
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <img src="" alt="" class="profile-photo w_100_p">
                            <div>
                                <input onchange="handlerChangeImage(event)" type="file" name="photo">
                            </div>
                            @error("photo") <p class="text-danger m-0">{{ $message }}</p> @endError
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
            if (!files.length === 0) return

            img.setAttribute("src",URL.createObjectURL(files[0]))
        }
    </script>
@endpush