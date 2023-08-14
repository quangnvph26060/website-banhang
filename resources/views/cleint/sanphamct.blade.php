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
                        <a class="nav-link" href="dangnhap.html">Đăng Ký</a>

                    </li>

                    <a href="{{route('showgiohang')}}"> <button type="button" class="btn btn-danger position-relative" style="width: 10%;float: right">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            1
    <span class="visually-hidden">unread messages</span>
  </span>
                        </button></a>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>



    <div class="row">
        <div class="col-7">
            <h3>Sản Phẩm chi tiết : {{$spdetail->tensanpham}} </h3>
            <div class="card mb-3" style="max-width: 100%">
                <form action="{{route('giohang')}}" method="POST">
                    @csrf

                    <input name="id_sp" value="{{$spdetail->id}}" type="hidden">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$spdetail->image ? Storage::url($spdetail->image):""}}"
                                 class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$spdetail->tensanpham}}</h5>
                                <p class="card-text">{{$spdetail->mota}}</p>
                                <p class="card-text"><small class="text-body-secondary">{{$spdetail->gia}}</small></p>
                                <p class="card-text"><small class="text-body-secondary">Số
                                        Lượng: {{$spdetail->soluong}}</small></p>
                                <input type="number" value="1" min="1" name="soluong">
                                <button type="submit" class="btn btn-primary" style="width: 30%">Đặt Hàng</button>
                                <button type="submit" class="btn btn-danger" style="width: 30%">Giỏ Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-5">
            <h3>Sản Phẩm Tương Tự </h3>
            <div class="card-group">
                @foreach($sp as $item)
                    <div class="card">
                        <a href="{{route('showdetail',['id'=>$item->id])}}">
                            <img src="{{$item->image ? Storage::url($item->image):""}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->tensanpham}}</h5>
                            <p class="card-text h5" style="color: red">{{ number_format($item->gia) }} đ</p>
                            <input type="hidden" value="{{$item->id}}" name="id">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection
