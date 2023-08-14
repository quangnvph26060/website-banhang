@extends('layout.template')
@section('content')
    <br>
    <br>



    <div class="row">
        <div class="col-7">
            <h3>Sản Phẩm chi tiết : {{$spdetail->tensanpham}} </h3>
            <div class="card mb-3" style="max-width: 100%">
                <form action="{{route('giohang')}}" method="POST">
                    @csrf

                    <input name="id_sp" value="{{$spdetail->id}}" type="hidden">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$spdetail->image ? Storage::url($spdetail->image):""}}"
                                 class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$spdetail->tensanpham}}</h5>
                                <p class="card-text">{{$spdetail->mota}}</p>
                                <p class="card-text"><small class="text-body-secondary">{{$spdetail->gia}}</small></p>
                                <p class="card-text"><small class="text-body-secondary">Số
                                        Lượng: {{$spdetail->soluong}}</small></p>
                                <input type="number" value="1" min="1" name="soluong">
                                <button type="submit" class="btn btn-primary" style="width: 30%">Đặt Hàng</button>
                                <button type="submit" class="btn btn-danger" style="width: 30%">Giỏ Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-5">
            <h3>Sản Phẩm Tương Tự </h3>
            <div class="card-group">
                @foreach($sp as $item)
                    <div class="card">
                        <a href="{{route('showdetail',['id'=>$item->id])}}">
                            <img src="{{$item->image ? Storage::url($item->image):""}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->tensanpham}}</h5>
                            <p class="card-text h5" style="color: red">{{ number_format($item->gia) }} đ</p>
                            <input type="hidden" value="{{$item->id}}" name="id">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection
