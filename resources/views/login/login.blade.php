<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>
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
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name </label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password"  name="password" value="{{old('password')}} "
                               class="form-control" id="exampleInputPassword1">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('register')}}">Đăng Ký</a>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
  </body>
</html>
