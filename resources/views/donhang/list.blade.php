@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="row">
            @include('layout.error')
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
            <th scope="col">Tên người đặt</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Số Điện thoại</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Sản Phẩm</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $index=> $item)
            <tr>

                <th scope="row">{{$index+1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->diachi}}</td>
                <td>{{$item->sdt}}</td>
                <td>{{$item->ngaydat}}</td>
                <td>{{$item->tensanpham}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->total_price}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <a href="{{route('editdh',['id'=>$item->id])}}" class="btn btn-success">Cập Nhật đơn hàng</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
