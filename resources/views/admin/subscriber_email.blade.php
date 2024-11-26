@extends("admin.layout.app")
@section("title","Type and Send Email")
@section("heading","Type and Send Email")
@section("link",route("front.index"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.subscribers") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Subscribers</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.subscriber.email.submit") }}" method="post">
                        @csrf
                        @method("post")
                        <div class="form-group mb-3">
                            <label>Sebject</label>
                            <input type="text" class="form-control" name="subject" value="{{ old("subject") }}">
                            @error("subject") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control h_100" cols="30" rows="10">{{ old("message") }}</textarea>
                            @error("message") <p class="text-danger m-0">{{ $message }}</p> @enderror
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