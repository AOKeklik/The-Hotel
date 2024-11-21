@extends("admin.layout.app")
@section("title",$contact->contact_heading)
@section("heading",$contact->contact_heading)
@section("link",route("front.contact"))
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
                    <form action="{{ route("admin.page.contact.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")                    
                        <div class="form-group mb-3">
                            <label>Contact Title *</label>
                            <input type="text" class="form-control" name="contact_title" value="{{ $contact->contact_title }}">
                            @error("contact_title") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Heading *</label>
                            <input type="text" class="form-control" name="contact_heading" value="{{ $contact->contact_heading }}">
                            @error("contact_heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Content *</label>
                            <textarea name="contact_content" class="form-control snote" cols="30" rows="10">{{ $contact->contact_content }}</textarea>
                            @error("contact_content") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Status *</label>
                            <div class="toggle-container">
                                <input @if($contact->contact_status == 1) checked @endif type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="contact_status" value="Yes">
                            </div>
                            @error("contact_status") <p class="text-danger m-0">{{ $message }}</p> @enderror
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