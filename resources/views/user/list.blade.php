@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="row">

        <div class="col-8">
            <form class="d-flex"  action="" method="POST">
                @csrf
                @method('GET')
                <input class="form-control me-2" type="search" placeholder="Search" name="inputsearch" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="btn">Search</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Họ và Tên</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">SDT</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">Email</th>
            <th scope="col">Vai Trò</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        @foreach($user as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <th scope="row">{{$item->name}}</th>
                <th scope="row">{{$item->diachi == 0 ?'Trống':$item->diachi}}</th>
                <th scope="row">{{$item->sdt == 0 ?'Trống':$item->sdt }}</th>
                <th scope="row">{{$item->gioitinh ==1 ? 'Nam':'Nữ'}}</th>
                <th scope="row">{{$item->email}}</th>
                <th scope="row">{{$item->role == 1 ? "Quản Trị":"Khách Hàng"}}</th>

                <td>

                    <a class="btn btn-primary"href="{{route('edituser',['id'=>$item->id])}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
