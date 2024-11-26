@extends("admin.layout.app")
@section("title","Edit Subscriber")
@section("heading","Edit Subscriber")
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
                    @error("subscriber_id") <p class="text-danger m-0">{{ $message }}</p> @enderror
                    <form action="{{ route("admin.subscriber.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="subscriber_id" value="{{ $subscriber->id }}">
                        <div class="form-group mb-3">
                            <label>Email *</label>
                            <input type="text" class="form-control" name="email" value="{{ $subscriber->email }}">
                            @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Status *</label>
                            <div class="toggle-container">
                                <input @if($subscriber->status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="status" value="Yes">
                            </div>
                            @error("status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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