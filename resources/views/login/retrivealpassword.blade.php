<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>

    <style>
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Quên mật khẩu</h2>
    <form action="{{route('resetpassword')}}" method="POST">
        @csrf

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$email}}" required>
        <style>
            .block {
                display: none;
            }

            .show {
                display: block;
            }

        </style>

        @if(Session('msg'))
            <div class="alert alert-danger" style="color: red">
                {{Session('msg')}}
            </div>
        @endif
        <input type="submit" class="btn btn-primary {{$fl==0?"block":""}}" value="Gửi Yêu Cầu"/>
        {{--                {!!   $fl==0?'<a href="'.route('/').'">Lấy Lại Mật Khẩu</a>':"Gửi Yêu Cầu" !!}--}}


    </form>
    <form method="POST" action="{{route('confrimpass')}}">
        @csrf
        @method('GET')
        <div class="block {{$fl==0?"show":""}}">
            <label for="email">Xác Nhận Mã:</label>
            <input type="text" id="maxacnhan" name="maxacnhan" class="form-control is-invalid">

        </div>
        <input type="submit" class="btn btn-primary {{$fl==0?"":"block"}}" value="Lấy lại mật khẩu "/>
    </form>
    <a href="{{route('login')}}">Quay lại</a>
</div>
</body>
</html>
