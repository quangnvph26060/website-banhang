<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function DonHangDetail()
    {
        $userid = Auth::id();
        $dh = OrderModel::where('id_user',$userid)

            ->join('order_items','orders.id','=','order_items.id_order')
            ->join('sanpham', 'sanpham.id', '=', 'order_items.id_sanpham')
            ->select('sanpham.tensanpham','orders.ngaydat',
                'orders.status','order_items.quantity','order_items.total_price')->get();

        ;
        return view('cleint.thongtinuser',compact('dh'));
    }
    //user dateil
    public function userDetail(){

        return view('cleint.userdetail');
    }
}
