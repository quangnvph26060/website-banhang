<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DonHangAdminController extends Controller
{
    // hiển thị tất cả đơn hàng đang có
    public function showCart()
    {

        $cart = OrderModel::
        join('users', 'orders.id_user', '=', 'users.id')
            ->join('order_items', 'orders.id', '=', 'order_items.id_order')
            ->join('sanpham', 'order_items.id_sanpham', '=', 'sanpham.id')
            ->select('orders.id', 'users.diachi', 'users.sdt', 'users.name', 'order_items.id_sanpham', 'sanpham.tensanpham', 'order_items.quantity', 'order_items.total_price',
                'orders.ngaydat', 'orders.status')->get();

        return view('donhang.list', compact('cart'));
    }

    public function editdonhang(Request $request, $id)
    {
        $cart = OrderModel::find($id);

       if($request->isMethod('POST')){

               $cart->id_user = $cart->id_user;
               $cart->ngaydat = $cart->ngaydat;
               $cart->payment = $cart->payment;
               $cart->status = $request->status;
                $result =  $cart->save();
                if($result){
                    Session::flash('success','Cập nhật trạng thái thành cong');
                    return  redirect(route('donhang'));

                }


       }
        return view('donhang.edit', compact('cart'));
    }

}
