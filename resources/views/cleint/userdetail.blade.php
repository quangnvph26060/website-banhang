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
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Đăng Ký</a>

                    </li>

                    <a href="{{route('showgiohang')}}">
                        <button type="button" class="btn btn-danger position-relative" style="width: 10%;float: right">
                            <i class="fas fa-shopping-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

    <span class="visually-hidden">unread messages</span>
  </span>
                        </button>
                    </a>
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
                    <a class="nav-link" href="{{route('userdetail')}}">Thông tin cá nhân</a>
                </li>
                @if(auth()->check())

                    <li class="list-group-item">
                        <a class="nav-link" href="{{route('thongtinuser')}}">Tình trạng đơn hàng </a>
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
            <div class="row">
                 <span>  Họ tên: {{auth()->user()->name}}
                    <button type="button" id="btn">edit</button>
                        <div class="update">
                            <form method="POST" action="{{route('username')}}">
                                @csrf
                                <input type="text" name="name" value="{{auth()->user()->name}}">
                               <button type="submit" >Save</button>
                            </form>
                        </div>
                     </span>
            </div>
            <div class="row">
                    <span> Địa Chỉ: {{auth()->user()->diachi == 0 ? "" :auth()->user()->diachi }}
                        <button type="button" id="btn1">edit</button>
                         <div class="update1">
                            <form method="POST" action="{{route('address')}}">
                                @csrf
                                <input type="text" name="diachi" value="{{auth()->user()->diachi}}">
                               <button type="submit" >Save</button>
                            </form>
                        </div>
                    </span>
            </div>
            <div class="row">
                    <span>  Số Điện Thoại: {{auth()->user()->sdt == 0 ? "":auth()->user()->sdt }}
                <button type="button" id="btn2">edit</button>
                <div class="update2">
                    <form method="POST" action="{{route('phone')}}">
                        @csrf
                        <input type="text" name="sdt" value="{{auth()->user()->sdt}}">
                        <button type="submit">Save</button>
                    </form>
                </div>
                    </span>
            </div>


        </div>

    </div>

    <br>



    <style>
        /*ẩn form thay đổi đi*/
        .update,.update1 , .update2 {
            display: none;
        }
        #btn,#btn1,#btn2 {
            background: white;
            border-color: white;
        }
    </style>
    <script>
        // tên
        document.querySelector('#btn').addEventListener('click', function () {
            // classList.remove xóa class update đi để hiển thị form thay đổi ra trong js
            document.querySelector('.update').classList.remove('update');
        });
        // địa chỉ
        document.querySelector('#btn1').addEventListener('click', function () {
            // classList.remove xóa class update đi để hiển thị form thay đổi ra trong js
            document.querySelector('.update1').classList.remove('update1');
        });
        // sdt
        document.querySelector('#btn2').addEventListener('click', function () {
            // classList.remove xóa class update đi để hiển thị form thay đổi ra trong js
            document.querySelector('.update2').classList.remove('update2');
        });
    </script>
@endsection
