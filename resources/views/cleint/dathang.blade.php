
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
        <div class="col-6">
                <p>Thông Tin Người Nhận</p>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Họ Tên</label>
                <input type="text"  name="name" value="{{auth()->user()->name}} "class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Địa Chỉ</label>
                <input type="text"  name="diachi" value="{{auth()->user()->diachi}} "class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text"><a href="#">Thay đổi địa chỉ người nhận</a></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="text"  name="sdt" value=" {{auth()->user()->sdt}}"class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">

                <input type="radio"  name="pttt" value="1" checked> Thanh Toán Khi nhận hàng
            </div>
            <div class="mb-3">

                <input type="radio"  name="pttt" value="2"> Chuyền Khoản MOMO
            </div>
            <div class="mb-3">

               <button type="submit" class="btn btn-primary">Đặt Hàng</button>
            </div>
        </div>
        <div class="col-6">
            <div class="card-group">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <p>Tổng Tiền:</p>
        </div>

    </div>



@endsection
