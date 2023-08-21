@if(Session('msg'))
    <div class="alert alert-success">
        {{Session('msg')}}
    </div>
@endif

@if($dh->isEmpty())
    <center>
        <p class="alert alert-success">Bạn Chưa Có Đơn Hàng Nào, Vui Lòng <a href="{{route('/')}}">Mua Hàng</a> Để Theo Dõi Đơn Hàng</p>
    </center>
@else
    <table class="table">

        <thead>
        <tr>
            <th scope="col">Sản Phẩm</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tồng Tiền</th>
            <th scope="col">Tình trạng đơn hàng</th>
            <th scope="col">Hoạt Động</th>
        </tr>
        </thead>
        <tbody>


        @foreach($dh as $item)
            <tr>
                <th scope="row">{{$item->tensanpham}}</th>
                <td >{{$item->ngaydat}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->total_price}}</td>
                <td>{{$item->status}}</td>
                <td>
                    @if($item->status == 'Chờ xác nhận')
                        <a href="{{route('deldh',['id'=>$item->id])}}" class="btn btn-danger">Hủy Đơn Hàng </a>
                    @elseif($item->status == 'Giao Hàng Thành Công')
                        <a class="btn btn-primary" href="#">Đánh Giá Đơn Hàng</a>
                    @else
                        <a class="btn btn-secondary"> Đơn Hàng đang được giao</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
