@extends("admin.layout.app")
@section("title", "Edit Profile")
@section("heading", "Edit Profile")
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
                    <form action="{{ route("admin.profile.submit") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="admin_id" value="{{ Auth::guard("admin")->user()->id }}">
                        <div class="row">
                            <div class="col-12">
                                @if (Session::has("error")) <p class="alert alert-danger">{{ Session::get("error") }}</p> @endif
                                @if (Session::has("status")) <p class="alert alert-success">{{ Session::get("status") }}</p> @endif
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/admin') }}/{{ Auth::guard("admin")->user()->photo }}" alt="" class="profile-photo w_100_p">
                                <input onchange="handleChangeProfileImage(event)" type="file" class="form-control mt_10" name="photo">
                                @error("photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::guard("admin")->user()->name }}">
                                    @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::guard("admin")->user()->email }}">
                                    @error("email") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="new_password">
                                    @error("new_password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" name="retype_password">
                                    @error("retype_password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
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
        function handleChangeProfileImage (e) {
            const parent = e.target.closest(".col-md-3")
            const img = parent.querySelector("img")
            const files = e.target.files

            if (files.length === 0) return

            const url = URL.createObjectURL(files[0])
            img.setAttribute("src", url)
        }
    </script>
@endpush