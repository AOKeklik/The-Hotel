@extends("admin.layout.app")
@section("title", "Add Feature")
@section("heading", "Add Feature")
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.features") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Features</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.feature.store") }}" method="post">
                        @csrf
                        @method("POST")
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-4 icon-admin">
                                    <i class=""></i>
                                </div>
                                <div class="col-md-8">
                                    <label>Icon</label>
                                    <input onchange="handleChangeIcon(event)" type="text" class="form-control" name="icon" value="{{ old("icon") }}">
                                    @error("icon") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ old("heading") }}">
                            @error("heading") <p class="text-danger m-0">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Text</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ old("text") }}</textarea>
                            @error("text") <p class="text-danger m-0">{{ $message }}</p> @enderror
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
        function handleChangeIcon (e) {
            const parent = e.target.closest(".row")
            const icon = parent.querySelector("i")
            const val = e.target.value.trim()

            if (!icon) return
            if (val.length <= 5) return

            icon.className = val
        }
    </script>
@endpush