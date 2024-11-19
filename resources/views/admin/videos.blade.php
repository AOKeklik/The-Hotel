@extends("admin.layout.app")
@section("title","Videos")
@section("heading","Videos")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.video.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Video</a>
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
                                    <th>Video</th>
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>
                                            <img style="width: 100px" src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                                        </td>
                                        <td>{{ $video->caption }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.video.edit", ["video_id" => $video->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.video.delete", ["video_id" => $video->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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