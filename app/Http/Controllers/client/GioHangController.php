<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Storage;
class GioHangController extends Controller
{
    // show giỏ hàng
    public function showGioHang(){
        $userId = Auth::id();
       $giohang = GiohangModel::where('id_user',$userId)
           ->join('sanpham','giohang.id_sp','=','sanpham.id')
           ->select('sanpham.image','sanpham.tensanpham','sanpham.mota','sanpham.gia','giohang.quantity')->get();
        return view('cleint.giohang',compact('giohang'));
    }
    public function addGioHang(Request $request){
        $sanphamID = $request->id_sp;
        $quantity = $request->soluong;
        $userId = Auth::id();
       if($userId == null){
           dd('vui lòng đăng ký để thêm sản phẩm vào giỏ hàng');
       }
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng của người dùng hay chưa
        $cartItem = GiohangModel::where('id_sp', $sanphamID)
            ->where('id_user', $userId)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo một bản ghi mới
            $cartItem = new GiohangModel();
            $cartItem->id_sp = $sanphamID;
            $cartItem->quantity = $quantity;
            $cartItem->id_user = $userId;
            $cartItem->save();
        }
        // Thông báo thành công và chuyển hướng đến trang giỏ hàng

       return redirect()->route('showgiohang')->with('msg','Thêm Giỏ Hàng Thành Công');
    }
}
