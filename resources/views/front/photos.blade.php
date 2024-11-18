@extends("front.layout.app")
@section("title","Photo Galery")
@section("heading","Photo Galery")
@section("content")
<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="photo-thumb">
                            <img src="{{ asset("uploads/photo/$photo->photo") }}" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="{{ asset("uploads/photo/$photo->photo") }}" class="magnific"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption">{{ $photo->caption }}</div>
                    </div>
                @endforeach

                <div class="col-md-12">
                    {{ $photos->links("pagination::bootstrap-5") }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection