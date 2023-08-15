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

    @if(Session('msg'))
        <div class="alert alert-primary">
            {{Session('msg')}}
        </div>
    @endif

    <h4> Giỏ Hàng Của:
        @if(auth()->check())
            {{auth()->user()->name ? auth()->user()->name :""}}
        @endif
    </h4>
    @if($giohang->isEmpty())
        <h2>Giỏ Hàng Trống</h2>
    @else
        <tbody>
        @php $tongtien = 0;
                $tong =0;
        @endphp
        @foreach($giohang as $item)
            <tr>

                <th scope="row">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{$item->image ? Storage::url($item->image):""}}"
                                     class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->tensanpham}}</h5>
                                    <p class="card-text">{{$item->mota}}</p>
                                    <p class="card-text"><small
                                            class="text-body-secondary">{{number_format($item->gia)}} đ</small></p>
                                    <p class="card-text"><small class="text-body-secondary">Số
                                            Lượng:{{$item->quantity}}</small></p>
                                    @php  $tongtien= $item->quantity*$item->gia;
                                        echo 'Tổng:'. number_format($tongtien).'đ' ;
                                        $tong +=$tongtien;
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>

                <td>
                    <a class="btn btn-danger" style="width: 20%" href="{{route('delgiohang',['id'=>$item->id])}}">Xóa</a>
                </td>

            </tr>

        @endforeach
        </tbody>
        <p style="float: right">Tổng Tiền: @php echo number_format($tong )@endphp</p>
        <a class="btn btn-primary" href="{{route('dathang')}}">Đặt Hàng</a>
        <br>
    @endif

@endsection
