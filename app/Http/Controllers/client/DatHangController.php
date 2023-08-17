<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatHangController extends Controller
{
    // đặt hàng
    public function showdathang(Request $request)
    {
        if (auth()->check()) {
            $userid = auth::id();
            $order = new OrderModel();
            $order->id_user = $userid;
            $order->payment = 0;
            $order->ngaydat = date('Y-m-d');
            $order->status = "Chờ xác nhận";
            $order->save();
            // Lấy các mục trong giỏ hàng từ cơ sở dữ liệu
            $cartItems = GiohangModel::where('id_user', $userid)->get();
            //   Thêm các sản phẩm vào đơn hàng
            foreach ($cartItems as $cartItem) {
                $orderItem = new OrderItemModel();
                $orderItem->id_order = $order->id; // lấy id của bảng order
                $orderItem->id_sanpham = $cartItem->id_sp;
                $orderItem->quantity = $cartItem->quantity;
                $priceProductId = SanPhamModel::find($cartItem->id_sp)->gia; // lấy giá của sản phẩm theo id
                $orderItem->total_price = $priceProductId * $cartItem->quantity;
                $orderItem->save();
            }
            GiohangModel::where('id_user', $userid)->delete(); // xóa giỏ hàng khi đặt hàng thành công

            $userId = Auth::id();
            $dathang = OrderModel::where('id_user', $userId)
                ->join('order_items', 'orders.id', '=', 'order_items.id_order')
                ->join('sanpham', 'order_items.id_sanpham', '=', 'sanpham.id')
                ->select('order_items.id_sanpham', 'sanpham.tensanpham', 'order_items.quantity', 'order_items.total_price',
                    'orders.ngaydat', 'orders.status')->get();
            return view('cleint.hoadon', compact('dathang'));
        } else {
            return redirect()->route('login');
        }
    }

    // ấn vào nút đặt hàng chỉ sâu ra ai dặt và sản phẩm muốn đặt thôi
    public function OrderDetail(Request $request)
    {
        if (auth()->check()) {
            $userid = Auth::id();
            $dathang = GiohangModel::where('id_user', $userid)
                ->join('sanpham', 'giohang.id_sp', '=', 'sanpham.id')
                ->select('sanpham.image', 'sanpham.tensanpham', 'sanpham.mota', 'sanpham.gia', 'giohang.quantity', 'giohang.id')->get();
            return view('cleint.dathang', compact('dathang'));
        } else {
            return redirect()->route('login');
        }
    }

}
