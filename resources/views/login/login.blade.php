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
          rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
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
    @if(Session('message'))
        <div class="alert alert-primary">
            {{Session('message')}}
        </div>
    @endif
    <div class="col-4"></div>
    <div class="col-4 py-5" style="border: 1px solid gainsboro;">
        @if(Session('error'))
            <div class="alert alert-danger">
                {{Session('error')}}
            </div>
        @endif
        <form action="{{route('login')}}" method="POST">
            @csrf
           <div class="row">
               <div class="mb-3">
                   <label for="exampleInputEmail1" class="form-label">User Name </label>
                   <input type="email" name="email" value="{{old('email')}}"
                          class="form-control
                            @error('email')
                                {{$message == $message?'is-invalid':""}}
                           @enderror
                           " id="exampleInputEmail1" aria-describedby="emailHelp">
                   <div class="invalid-feedback">
                       @error('email')
                       {{$message}}
                       @enderror
                   </div>
               </div>
               <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Password</label>
                   <input type="password" name="password" value="{{old('password')}}"
                          class="form-control
                        @error('password')
                        {{$message == $message?'is-invalid':""}}
                        @enderror
                        " id="exampleInputPassword1">
                   <div class="invalid-feedback">
                       @error('password')
                       {{$message}}
                       @enderror
                   </div>
               </div>

               <button type="submit" class="btn btn-primary">Đăng Nhập</button>
              <p> <a href="{{route('register')}}" class="link-underline-light">Đăng Ký</a></p>
               <p><a href="{{route('mk')}}"  class="link-underline-light">Quên mật khẩu </a></p>
           </div>
        </form>
    </div>
    <div class="col-4"></div>
</div>
</body>
</html>
