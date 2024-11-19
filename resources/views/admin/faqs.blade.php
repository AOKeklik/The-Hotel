@extends("admin.layout.app")
@section("title","Faqs")
@section("link",route("front.faq"))
@section("heading","Faqs")
@section("button")
    <div class="ml-auto">
        <a href="{{ route("admin.faq.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Faq</a>
    </div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(Session::has("status")) <p class="alert alert-success p-0">{{ Session::get("status") }}</p> @endif
                        @if(Session::has("error")) <p class="alert alert-danger p-0">{{ Session::get("error") }}</p> @endif    
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq) 
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route("admin.faq.edit", ["faq_id" => $faq->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route("admin.faq.delete", ["faq_id" => $faq->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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