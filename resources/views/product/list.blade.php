@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-4">
            <a href="{{route('addsanpham')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
        </div>
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
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Giá Sản Phẩm </th>
            <th scope="col">Mô tả </th>
            <th scope="col">Số Lượng </th>
            <th scope="col">Hãng </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        @foreach($sp as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->tensanpham}}</td>
                <td>
                    <img src="{{$item->image ? Storage::url($item->image):""}}" width="30%">
                </td>
                <td>{{$item->gia}}</td>
                <td>{{$item->mota}}</td>
                <td>{{$item->soluong}}</td>
                <td>
                    @foreach($loai as $a)
                       @if($a->id == $item->id_loai)
                           {{$a->tenloai}}
                       @endif
                    @endforeach
                </td>
                <td>
                    <a onclick="return confirm('Bạn Có Muốn Xóa Không')" class="btn btn-danger"
                       href="{{route('delsanpham',['id'=>$item->id])}}">Delete</a>
                    <a class="btn btn-primary"href="{{route('editsanpham',['id'=>$item->id])}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    <nav aria-label="...">
        <ul class="pagination pagination-lg">
            {{ $sp->links('pagination::default') }}
        </ul>
    </nav>




@endsection
