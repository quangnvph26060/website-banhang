<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatHangController extends Controller
{
    public function showdathang(Request $request){
        if(auth()->check()){
            $userid = auth::id();

            // Lấy các mục trong giỏ hàng từ cơ sở dữ liệu
            $cartItems = Cart::where('user_id', $userid)->get();
            // Thêm các sản phẩm vào đơn hàng
//            foreach ($cartItems as $cartItem) {
//                $orderItem = new OrderItem();
//                $orderItem->order_id = $order->id;
//                $orderItem->product_id = $cartItem->product_id;
//                $orderItem->quantity = $cartItem->quantity;
//                $orderItem->save();
//            }
            return view('cleint.dathang');
        }else{
            return  redirect()->route('login');
        }
    }
}
