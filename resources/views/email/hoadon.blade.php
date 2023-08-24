<div>
    <h4>Cảm ơn {{$name}} đã mua hàng của chúng tôi</h4>
    <table class="table" border="1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Ngày đặt</th>

            <th scope="col">Trạng Thái</th>
            <th scope="col">Thành Tiền</th>
        </tr>
        </thead>
        <tbody>
        @php
            $tongtien = 0;
        $tong =0;
        @endphp
        @foreach($dathang as $index=> $item)

           @if($item->ngaydat ==date('Y-m-d') )
               <tr>
                   <th scope="row">{{$index+1}}</th>
                   <td>{{$item->tensanpham}}</td>
                   <td>{{$item->quantity}}</td>
                   <td>{{$item->ngaydat}}</td>
                   <td>{{$item->status }}</td>
                   <td>{{$item->total_price}}</td>

               </tr>
           @endif
            @php
                $tong +=$item->total_price;
            @endphp
        @endforeach
        </tbody>
    </table>
    <h3 style="float: left">Tổng Tiền:@php echo number_format($tong ) .'đ'@endphp</h3>
    <span>Vui lòng theo dõi đơn hàng <a href="{{route('thongtinuser')}}">Tại đây!</a></span>
</div>
