
@extends('layout.template')
@section('content')
    @section('title','Hóa Đơn')
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Đăng Ký</a>

                        </li>
                    @endif



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
    <div class="row">
        <p class="h3" style="text-align: center;font-weight: 700; padding: 10px">Hóa Đơn
            của {{auth()->user()->name}} </p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Ngày đặt</th>

                <th scope="col">Trạng Thái</th>
                <th scope="col">Thành Tiền</th>
            </tr>
            </thead>
            <tbody>
            @php
                $tongtien = 0;
            $tong =0;
            @endphp
            @foreach($dathang as $index=> $item)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$item->tensanpham}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->ngaydat}}</td>
                    <td>{{$item->status }}</td>
                    <td>{{$item->total_price}}</td>

                </tr>
                @php

                    $tong +=$item->total_price;
                @endphp
            @endforeach
            </tbody>
        </table>
        <p class="h6" style="float: left">Tổng Tiền:@php echo number_format($tong ) .'đ'@endphp</p>
        <p class="h6" style="float: left">Phương thức thanh toán:Thanh Toán Khi nhận hàng</p>
        <a href="{{route('thongtinuser')}}">Theo dõi đơn hàng</a>
        <a href="{{route('/')}}" style="text-align: center"  class="btn btn-success">Tiếp Tục Mua Hàng</a>
    </div>



@endsection

