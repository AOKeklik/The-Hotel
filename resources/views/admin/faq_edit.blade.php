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
                    <form action="{{ route("admin.faq.update") }}" method="post">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                        <div class="form-group mb-3">
                            <label>Question</label>
                            <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                            @error("question") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ $faq->answer }}</textarea>
                            @error("answer") <p class="text-danger m-0">{{ $message }}</p> @enderror
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