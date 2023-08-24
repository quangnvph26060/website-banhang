
@extends('layout.template')
@section('content')
    @section('title','Theo dõi đơn hàng')
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
                            <a class="nav-link" href="{{route('thongtinuser')}}">Chào,{{auth()->user()->name}}</a>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Đăng Ký</a>

                        </li>
                    @endif



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
    <div class="row">
        <div class="col-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="nav-link"href="{{route('userdetail')}}">Thông tin cá nhân</a>
                </li>
                @if(auth()->check())
                    <li class="list-group-item">
                        <a class="nav-link" href="{{route('thongtinuser')}}">Tình trạng đơn hàng </a>
                    </li>

                    <li class="list-group-item">
                        <a class="nav-link" href="{{route('changepass')}}">Đổi mật khẩu</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{route('logout')}}">Đăng Xuất</a>
                    </li>
                    @if(auth()->user()->role  == 1)
                        <li class="list-group-item">
                            <a class="nav-link" href="{{route('danhsach')}}">Quản trị</a>
                        </li>
                    @endif
                @endif
            </ul>

        </div>
        <div class="col-8">
                @include('cleint.donhangdetail',compact('dh'))
        </div>

    </div>

    <br>


@endsection
