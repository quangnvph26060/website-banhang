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
    <form action="{{route('resetpassword')}}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        @if(Session('msg'))
            <div class="alert alert-danger" style="color: red">
                {{Session('msg')}}
            </div>
        @endif
        <input type="submit" value="Gửi yêu cầu">
        <a href="{{route('login')}}">Quay lại</a>
    </form>
</div>
</body>
</html>
