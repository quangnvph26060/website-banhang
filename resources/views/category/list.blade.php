@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-4">
            <a href="{{route('addloai')}}" class="btn btn-primary">Thêm Loại</a>
        </div>
        <div class="col-8">
            <form class="d-flex"  action="{{route('sreachloai')}}" method="POST">
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
            <th scope="col">Tên Loại</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
       @foreach($loai as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->tenloai}}</td>
                <td>
                    <img src="{{$item->image ? Storage::url($item->image):""}}" width="30%">
                </td>
                <td>
                    <a onclick="return confirm('Bạn Có Muốn Xóa Không')" class="btn btn-danger" href="{{route('deleteLoai',['id'=>$item->id])}}">Delete</a>
                    <a class="btn btn-primary"href="{{route('editloai',['id'=>$item->id])}}">Edit</a>
                </td>
            </tr>
       @endforeach
    </table>
@endsection
