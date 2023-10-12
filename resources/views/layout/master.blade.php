<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <link rel="stylesheet" href="{{asset('boostrap/css/style.css')}}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"  href="{{asset('bootstrap/css/bootstrap.css')}}">
    <style>

    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('danhsach')}}">Quản Lý Loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listsp')}}">Quản lý sản phẩm </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listuser')}}">Quản Lý Khách Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('donhang')}}">Quản Lý Đơn Hàng</a>
                    </li>


                </ul>
                <li class="nav-item" id="trangchu" style="text-decoration: none;display: inline-block">
                   <span>Chào; {{auth('web')->user()->name ? auth('web')->user()->username:" user"}}</span> / <a class="nav-link" href="{{route('/')}}">Thoát Admin</a>
                </li>
            </div>
        </div>
    </nav>
    <div class="content">
        {{--                hiển thị lỗi--}}
        @include('layout.error')
        @yield('content')
    </div>

    <footer>
        <div class="alert alert-primary" role="alert">
            quangnvph26060
        </div>
    </footer>

</div>
</body>
<script src="{{asset('bootstrap/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script>
    $(function () {
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cmt_anh").change(function () {
            readURL(this, '#anh_the_preview');
        });

    });
</script>
</html>

