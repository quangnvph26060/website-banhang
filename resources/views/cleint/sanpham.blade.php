@extends('layout.template')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: white !important;">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="./img/logo.PNG" alt="Logo" width="100%">
            </a>

            <!-- Toggle button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('/')}}">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên Hệ</a>
                    </li>
                    {{--                    Kiểm tra xem người dùng có đăng nhập hay không --}}
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Đăng Xuất</a>
                        </li>
                        @if(auth()->user()->role  == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('danhsach')}}">Quản trị</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Đăng Ký</a>
                    </li>
                    <a href="{{route('showgiohang')}}"> <button type="button" class="btn btn-danger position-relative" style="width: 10%;float: right">
                           <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

    <span class="visually-hidden">unread messages</span>
  </span>
                        </button></a>
                </ul>
            </div>
        </div>
    </nav>
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
