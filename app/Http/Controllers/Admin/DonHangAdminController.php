<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;

// add thư viện của laravel
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
        if ($request->isMethod('POST')) {
            $cart->id_user = $cart->id_user;
            $cart->ngaydat = $cart->ngaydat;
            $cart->payment = $cart->payment;
            $cart->status = $request->status;
            $result = $cart->save();
            // lấy mail của khách hàng
            $mail = OrderModel::join('users','orders.id_user','=','users.id')
                ->select('users.email','users.name')->where('users.id' ,'=',$cart->id_user)->find($id);

            if ($result) {
                // nếu edit là giao hàng thành công thì gửi mail cho khách hàng
                // để xác nhận đơn hàng đã giao thành công
                if ($cart->status == 'Giao Hàng Thành Công') {
                    $datetime = date('m-d-Y');
                    $mailuser = $mail->email;
                    $nameuser = $mail->name;
                    Mail::send('email.orderdetail', compact('nameuser','datetime'), function ($email) use($mailuser,$nameuser){
                        $email->subject('Giao Hàng Thành Công');
                        $email->to($mailuser,$nameuser); // tham số đầu  tiên là địa chỉ mail nhận , tham số 2 là  tên người nhận
                    });
                }
                Session::flash('success', 'Cập nhật trạng thái thành công');
                return redirect(route('donhang'));
            }
        }
        return view('donhang.edit', compact('cart'));
    }


}
