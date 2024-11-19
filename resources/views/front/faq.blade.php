@extends("front.layout.app")
@section("title","Faq")
@section("heading","Faq")
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    @php $i = 0; @endphp
                    @foreach($faqs as $faq) 
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button @if($i != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $i }}" aria-expanded="@if($i == 0) true @else false @endif" aria-controls="collapseOne-{{ $i }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapseOne-{{ $i }}" class="accordion-collapse collapse @if($i === 0) show @endif" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">{!! $faq->answer !!}</div>
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection