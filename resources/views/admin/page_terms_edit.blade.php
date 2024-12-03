@extends("admin.layout.app")
@section("title","Edit Terms and Conditions")
@section("link",route("front.terms"))
@section("heading","Edit Terms and Conditions")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboard</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has("status")) <p class="alert alert-success p-1">{{ Session::get("status") }}</p> @endif
                    @if(Session::has("error")) <p class="alert alert-danger p-1">{{ Session::get("error") }}</p> @endif
                    <form action="{{ route("admin.page.terms.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Terms Heading</label>
                            <input type="text" class="form-control" name="terms_heading" value="{{ $page->terms_heading }}">
                        </div>
                        @error("terms_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        <div class="form-group mb-3">
                            <label>Terms Content</label>
                            <textarea name="terms_content" class="form-control snote" cols="30" rows="10">{{ $page->terms_content }}</textarea>
                        </div>
                        @error("terms_content") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        <div class="form-group mb-3">
                            <label>Toggle Option *</label>
                            <div class="toggle-container">
                                <input @if($page->terms_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="terms_status" value="Yes">
                            </div>
                        </div>
                        @error("terms_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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