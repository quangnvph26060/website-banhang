<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\LoaiModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SanPhamAdminController extends Controller
{
    public function showProduct()
    {
        $sp = SanPhamModel::paginate(5); // phân trang 5 bản ghi
        $loai = LoaiModel::all(); // hiển thị đúng tên loại ra view
        return view('product.list', compact('sp', 'loai'));
    }

    public function addSanPham(SanPhamRequest $request)
    {
        $loai = LoaiModel::all();
        // thêm sản phẩm
        if ($request->isMethod('POST')) {

            // xử lý ảnh
            if ($request->hasFile('hinh') && $request->file('hinh')->isValid()) {
                $request->hinh = uploadFile('hinh', $request->file('hinh'));
            }
            $result = DB::table('sanpham')->insert([
                'tensanpham' => $request->name,
                'image' => $request->hinh,
                'gia' => $request->gia,
                'mota' => $request->mota,
                'soluong' => $request->sl,
                'id_loai' => $request->hangloai,
                'luotxem' => 0,
            ]);
            if ($result) {
                Session::flash('success', 'Thêm thành công ');
                return redirect()->route('listsp');
            }
        }
        return view('product.add', compact('loai'));
    }

    public function editSanPham(SanPhamRequest $request, $id)
    {
        $loai = LoaiModel::all();
        $sp = SanPhamModel::find($id);
        if ($request->isMethod('POST')) {
            if ($request->hasFile('hinh') && $request->file('hinh')->isValid()) {
                $DL = Storage::delete('public' . $sp->image);
                if ($DL) {
                    $request->hinh = uploadFile('hinh', $request->file('hinh'));
                }
            } else {
                $request->hinh = $sp->image;
            }
            $result = DB::table('sanpham')->where('id', $id)->update([
                'tensanpham' => $request->name,
                'image' => $request->hinh,
                'gia' => $request->gia,
                'mota' => $request->mota,
                'soluong' => $request->sl,
                'id_loai' => $request->hangloai,
                'luotxem' => 0,
            ]);
            if ($result) {
                Session::flash('success', 'Cập nhật sản phẩm  thành công ');
                return redirect()->route('listsp');
            }
        }
        return view('product.edit', compact('loai', 'sp'));
    }
    // xóa
    public function delSanPham($id){
            $result = SanPhamModel::find($id);
            if($result){
                $result->delete();
                Session::flash('success', 'Xóa  sản phẩm  thành công ');
                return redirect()->route('listsp');
            }
    }
}
