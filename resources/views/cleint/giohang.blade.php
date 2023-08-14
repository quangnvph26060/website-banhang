@extends('layout.template')
@section('content')
    <br>
    <br>

        @if(Session('msg'))
            <div class="alert alert-primary">
                {{Session('msg')}}
            </div>
        @endif

    <h4> Giỏ Hàng Của:
            @if(auth()->check())
            {{auth()->user()->name ? auth()->user()->name :""}}
            @endif
    </h4>
    @if($giohang->isEmpty())
            <h2>Giỏ Hàng Trống</h2>
    @else
        <tbody>
       @foreach($giohang as $item)


           <tr>
               <th scope="row"><div class="card mb-3" style="max-width: 540px;">
                       <div class="row g-0">
                           <div class="col-md-4">
                               <img src="{{$item->image ? Storage::url($item->image):""}}" class="img-fluid rounded-start" alt="...">
                           </div>
                           <div class="col-md-8">
                               <div class="card-body">
                                   <h5 class="card-title">{{$item->tensanpham}}</h5>
                                   <p class="card-text">{{$item->mota}}</p>
                                   <p class="card-text"><small class="text-body-secondary">{{number_format($item->gia)}} đ</small></p>
                                   <p class="card-text"><small class="text-body-secondary">Số Lượng:{{$item->quantity}}</small></p>
                               </div>
                           </div>
                       </div>
                   </div></th>


           </tr>
           <tr>

               <td>
                   <a class="btn btn-danger" style="width: 20%" href="#">Xóa</a>
               </td>

           </tr>


       @endforeach
    </tbody>
        <p style="float: right">Tổng Tiền</p>
     <a class="btn btn-primary">Đặt Hàng</a>
        <br>
    @endif

@endsection
