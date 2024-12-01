@extends("admin.layout.app")
@section("title","Edit Faq")
@section("heading","Edit Faq")
@section("link",route("front.faq"))
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.faqs") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Faqs</a>
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
                    <form action="{{ route("admin.page.faq.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label>Faq Heading</label>
                            <input type="text" class="form-control" name="faq_heading" value="{{ $faq->faq_heading }}">
                            @error("faq_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Faq Status</label>
                            <div class="toggle-container">
                                <input @if($faq->faq_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="faq_status" value="Yes">
                            </div>
                            @error("faq_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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