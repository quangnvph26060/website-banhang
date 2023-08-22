<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DonHangController extends Controller
{
    public function DonHangDetail()
    {
        $userid = Auth::id();
        $dh = OrderModel::where('id_user', $userid)
            ->join('order_items', 'orders.id', '=', 'order_items.id_order')
            ->join('sanpham', 'sanpham.id', '=', 'order_items.id_sanpham')
            ->select('sanpham.tensanpham', 'orders.ngaydat',
                'orders.status', 'order_items.quantity', 'order_items.total_price', 'order_items.id')->get();;

        return view('cleint.thongtinuser', compact('dh'));
    }

    // xóa đơn hàng bên cleint
    public function delDonHang($id)
    {
        // xóa id bảng order không còn liên kết với bảng order_items nữa
        DB::table('orders')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('order_items')
                    ->whereRaw('orders.id = order_items.id_order');
            })
            ->delete();
        // xóa đơn hàng chưa xác nhận
        $result = OrderItemModel::find($id);
        if ($result) {
            $result->delete();
            return redirect()->route('thongtinuser')->with('msg', 'Xóa đơn hàng thành công');
        }
    }
    //user dateil
    public function userDetail()
    {
        return view('cleint.userdetail');
    }

}
