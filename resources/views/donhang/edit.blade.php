@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="row">
        <div>
           <form action="{{route('editdh',['id'=>$cart->id])}}" method="POST">
               @csrf
               <label>Cập Nhật Trạng Thái Đơn Hàng</label>
               <select class="form-select" name="status" >
                   <option value="Chờ xác Nhận" {{$cart->status =='Chờ xác Nhận' ? 'selected':''}}>Chờ xác Nhận</option>
                   <option value="Đã Xác Nhận"  {{$cart->status =='Đã Xác Nhận' ? 'selected':''}}>Đã Xác Nhận</option>
                   <option value="Đơn hàng đang vận chuyển" {{$cart->status =='Đơn hàng đang vận chuyển' ? 'selected':''}}>Đơn hàng đang vận chuyển</option>
                   <option value="Giao Hàng Thành Công" {{$cart->status =='Giao Hàng Thành Công' ? 'selected':''}}>Giao Hàng Thành Công</option>
               </select>
               <br>
               <button type="submit" class="btn btn-success">Cập Nhật</button>
           </form>
        </div>

    </div>


@endsection
