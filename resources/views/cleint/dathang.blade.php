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

                    <a href="{{route('showgiohang')}}">
                        <button type="button" class="btn btn-danger position-relative" style="width: 10%;float: right">
                            <i class="fas fa-shopping-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            1
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
        <div class="col-6">
            <p>Thông Tin Người Nhận</p>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Họ Tên</label>
                <input type="text" name="name" value="{{auth()->user()->name}} " class="form-control"
                       id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Địa Chỉ</label>
                <input type="text" id="diachi" name="diachi"
                       value="{{auth()->user()->diachi }} "
                       class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text"><a href="{{route('userdetail')}}">Thay đổi địa chỉ người
                        nhận</a></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="text" id="phone" name="sdt"
                       value=" {{auth()->user()->sdt}}"
                       class="form-control"
                       id="exampleInputPassword1">
                <div id="emailHelp" class="form-text"><a href="{{route('userdetail')}}">Thay đổi số điện thoại
                        người nhận</a>
                </div>
                <form action="{{route('dathang')}}" method="POST">
                    @method('GET')
                    @csrf
                    <div class="mb-3">
                        <input type="radio" name="payment" value="Thanh Toán Khi nhận hàng" checked> Thanh Toán Khi
                        nhận hàng
                    </div>

                    <div class="mb-3">

                        <a class="btn btn-primary" href="{{route('dathang')}}" id="btn"> Đặt Hàng</a>
                    </div>
                </form>
                <script>
                    document.getElementById('btn').addEventListener('click',function (e){
                        e.preventDefault(); // ngăn không cho reload lại trang
                        var phone = document.getElementById("phone").value; // lấy giá trị của phone
                        var diachi = document.getElementById("diachi").value; // lấy giá trị của diachi

                        if (phone ==0 || diachi ==0) {
                           alert('Vui Lòng Cập nhật Địa Chỉ và Số điện thoại ')
                        }else{
                            // thực hiện route xuất hóa đơn
                            window.location.href = "/dathang";
                        }
                    });

                </script>

            </div>
            <div class="col-6">
                <div class="card-group">
                    @php
                        $tongtien = 0;
                    $tong =0;
                    @endphp
                    @foreach($dathang as $item)
                        <div class="card">
                            <img src="{{$item->image ? Storage::url($item->image):""}}"
                                 class="img-fluid rounded-start" alt="..." width="30%">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->tensanpham}}</h5>
                                <p class="card-text">{{$item->mota}}</p>
                                <p class="card-text"><small
                                        class="text-body-secondary">{{number_format($item->gia)}} đ</small></p>
                                <p class="card-text"><small class="text-body-secondary">Số
                                        Lượng:{{$item->quantity}}</small></p>
                            </div>
                        </div>
                        @php  $tongtien= $item->quantity*$item->gia;

                                        $tong +=$tongtien;
                        @endphp
                    @endforeach
                </div>
                <p>Tổng Tiền: @php echo number_format($tong ) .'đ'@endphp</p>
            </div>

        </div>

@endsection
