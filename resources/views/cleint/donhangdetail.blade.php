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
            <td colspan="2">{{$item->ngaydat}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total_price}}</td>
            <td>{{$item->status}}</td>
            <td>xóa</td>
        </tr>
    @endforeach
    </tbody>
</table>
