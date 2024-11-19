@extends("admin.layout.app")
@section("title","Add Video")
@section("heading","Add Video")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.videos") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Videos</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.video.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <input type="text" class="form-control" name="caption" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label style="display: block">Video</label>
                            <img src="" alt="" class="profile-photo" style="max-width:max-content">
                            <input onchange="handlerChangeImage(event)" type="text" class="form-control" name="video_id" value="">
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
            const val = e.target.value.trim()
            
            if (!img) return
            if (val === "") return
            
            img.setAttribute("src","https://img.youtube.com/vi/"+val+"/0.jpg")
        }
        //https://img.youtube.com/vi/tvsyp08Uylw/0.jpg
    </script>
@endpush