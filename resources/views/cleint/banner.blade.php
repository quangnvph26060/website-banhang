@extends('layout.template')
@section('content')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">


            @foreach($banner as $item)
                <div class="carousel-item">
                    <img src="{{$item->imagebanner ? Storage::url($item->imagebanner):""}}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

@endsection
