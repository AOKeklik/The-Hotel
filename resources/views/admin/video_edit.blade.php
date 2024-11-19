@extends("admin.layout.app")
@section("title","Edit Video")
@section("link",route("front.videos"))
@section("heading","Edit Video")
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
                    <form action="{{ route("admin.video.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="video_own_id", value="{{ $video->id }}">
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <input type="text" class="form-control" name="caption" value="{{ $video->caption }}">
                        </div>
                        <div class="form-group mb-3">
                            <label style="display: block">Video</label>
                            <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="" class="profile-photo" style="max-width:max-content">
                            <input onchange="hanlerChangeImage(event)" type="text" class="form-control" name="video_id" value="{{ $video->video_id }}">
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
        function hanlerChangeImage (e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = parent.querySelector("img")
            const val = e.target.value.trim()

            if (!img) return
            if (val === "") return

            img.setAttribute("src","https://img.youtube.com/vi/"+val+"/0.jpg")
        }
    </script>
@endpush