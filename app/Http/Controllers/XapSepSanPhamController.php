<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoaiModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class XapSepSanPhamController extends Controller
{
    public function XapSepSanPham(Request $request)
    {
        $chon = $request->xapsep;
        switch ($chon) {
            case '0':
                $sp = SanPhamModel::all();
                $banner = DB::table('setting')->select('imagebanner')->get();
                $loai = LoaiModel::all();
                return view('cleint.sanpham', compact('sp', 'banner','loai'));
            case '1':
                $sp = SanPhamModel::orderBy('gia', 'desc')->paginate(9); // xắp sếp theo giá cao đến thấp
                $banner = DB::table('setting')->select('imagebanner')->get();
                $loai = LoaiModel::all();
                return view('cleint.sanpham', compact('sp', 'banner','loai'));

            case '2':
                $sp = SanPhamModel::orderBy('gia', 'asc')->paginate(9); // xắp sếp theo giá thấp đến cao
                $banner = DB::table('setting')->select('imagebanner')->get();
                $loai = LoaiModel::all();
                return view('cleint.sanpham', compact('sp', 'banner','loai'));

        }
    }

}
