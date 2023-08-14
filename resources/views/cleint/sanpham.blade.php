@extends('layout.template')
@section('content')
    <br>
    <br>
    <br>
    @foreach($banner as $item)
        <img src="{{$item->imagebanner ? Storage::url($item->imagebanner):""}}" class="d-block w-100" alt="...">
    @endforeach

    <br>
    <aside>
        <div class="row">
            <div class="col-9">
                @include('layout.error')
                <div class="container text-center">
                    <div class="row">
                        @foreach($sp as $item)
                            <input type="hidden" value="{{$item->id}}" name="id">
                            <div class="col-md-4">
                                <div class="card image-container" style="width: 15rem;">
                                    <a href="{{route('showdetail',['id'=>$item->id])}}"><img
                                            src="{{$item->image ? Storage::url($item->image):""}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->tensanpham}}</h5>
                                        <p class="card-text h5" style="color: red">{{ number_format($item->gia) }} đ</p>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                {{--                <nav aria-label="...">--}}
                {{--                    <ul class="pagination pagination-lg">--}}
                {{--                        {{ $sp->links('pagination::default') }}--}}
                {{--                    </ul>--}}
                {{--                </nav>--}}
            </div>
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item" style="font-weight: 600">Danh Mục</li>
                    @foreach($loai as $item)
                        <from method="POST" action="{{route('showdm',['id'=>$item->id])}}">
                            <input type="hidden" value="{{$item->id}}" name="id">
                            <li class="list-group-item  d-flex justify-content-between align-items-start">
                                <a href="{{route('showdm',['id'=>$item->id])}}">{{$item->tenloai}} </a>
                            </li>
                        </from>
                    @endforeach
                </ul>
                <br>
{{--                tìm kiếm --}}
                <form class="d-flex" role="search" method="POST" action="{{route('sreach')}}">
                    @csrf
                    @method('GET')
                    <input class="form-control me-2" name="inputsreach" type="search" placeholder="Search" aria-label="Search">
                    <button type="submit" name="btn">Tìm </button>
                </form>
            </div>
        </div>

    </aside>

@endsection
