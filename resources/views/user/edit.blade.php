@extends('layout.master')
@section('content')
    <form action="{{route('edituser',['id'=>$user->id])}}" method="POST" >
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên </label>
            <input type="text" class="form-control" name="ten" value="{{$user->name}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Địa Chỉ </label>
            <input type="text" class="form-control" name="diachi" value="{{$user->diachi}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Địa Chỉ </label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Phone </label>
            <input type="text" class="form-control" name="sdt" value="{{$user->sdt}}">

        </div>

        <div class="form-check">
            <input type="radio" name="gender" value="1" {{$user->gioitinh==1?"checked":""}}> Nam
            <input type="radio" name="gender" value="2"{{$user->gioitinh==2?"checked":""}}> Nữ
        </div>

        <select name="role">
            <option value="1"{{$user->role==1?  "selected":""}}>Quản trị</option>
            <option value="0" {{$user->role==0 ? "selected" : ""}}>Khách Hàng</option>
        </select>
        <br>
        <button class="btn btn-success" type="submit">Save</button>

    </form>
@endsection

