@extends("admin.layout.app")
@section("title","Seach Datewise Room")
@section("heading","Seach Datewise Room")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboards</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has("status")) <p class="alert alert-success p-1 text-center">{{ Session::get("status") }}</p> @endif
                    @if(Session::has("error")) <p class="alert alert-success p-1 text-danger">{{ Session::get("error") }}</p> @endif
                    <form action="{{ route("admin.datewise-room.submit") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("POST")                        
                        <div class="form-group mb-3">
                            <label>Selected Date</label>
                            <input type="text" class="form-control datepicker" name="selected_date" value="{{ old("selected_date") }}">
                            @error("selected_date") <p class="text-danger m-0">{{ $message }}</p> @enderror
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