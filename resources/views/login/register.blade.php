<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Ký</title>
    {{--    <link rel="stylesheet" href="{{asset('boostrap/css/style.css')}}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"  href="{{asset('bootstrap/css/bootstrap.css')}}">
    <style>

    </style>
</head>
<body>
<div class="row">
    @if(Session('msg'))
        <div class="alert alert-primary">
            {{Session('msg')}}
        </div>
    @endif
    <div class="col-4"></div>
    <div class="col-4">
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name </label>
                <input type="text" name="name" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password"  name="password" value="{{old('password')}} "class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Enter the password</label>
                <input type="password"  name="enterpassword" value="{{old('enterpassword')}} "class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"  value="1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                   Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="2" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('login')}}">Đăng Nhập</a>
        </form>
    </div>
    <div class="col-4"></div>
</div>
</body>
</html>
