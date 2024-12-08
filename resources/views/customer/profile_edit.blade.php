@extends("customer.layout.app")
@section("title","Edit Profile")
@section("heading","Edit Profile")
@section("button")
<div class="ml-auto">
    <a href="{{ route("customer.index") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Dashboard</a>
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
                    <form action="{{ route("customer.profile.update") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center">
                                <div class="form-group">
                                    <label>Photo</label>
                                    @if(empty($profile->photo))
                                        <div style="display:none;width:200px;padding:10px;">
                                            <img id="user-img" width="100%" src="" alt="">
                                        </div>
                                    @else
                                        <div style="width:200px;padding:10px;">
                                            <img width="100%" src="{{ asset("uploads/customer/$profile->photo") }}" alt="">
                                        </div>
                                    @endif
                                    <div>
                                        <input onchange="handlerChangeImage(event)" type="file" name="photo">
                                    </div>
                                    @error("photo") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                                    @error("name") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" value="">
                                    @error("password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Confirm Password</label>
                                    <input type="text" class="form-control" name="confirm_password" value="">
                                    @error("confirm_password") <p class="text-danger m-0">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-4">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
                                @error("phone") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country" value="{{ $profile->country }}">
                                @error("country") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
                                @error("address") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" value="{{ $profile->state }}">
                                @error("state") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" value="{{ $profile->city }}">
                                @error("city") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label>Zip</label>
                                <input type="text" class="form-control" name="zip" value="{{ $profile->zip }}">
                                @error("zip") <p class="text-danger m-0">{{ $message }}</p> @enderror
                            </div>
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
        function handlerChangeImage(e) {
            const parent = e.target.closest(".form-group.mb-3")
            const img = document.getElementById("user-img")
            const files = e.target.files

            if(!img) return
            if(!files.length === 0) return

            img.setAttribute("src",URL.createObjectURL(files[0]))
            img.parentElement.style.display = "block"
        }
    </script>
@endpush