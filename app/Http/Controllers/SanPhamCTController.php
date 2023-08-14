<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoaiModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;

class SanPhamCTController extends Controller
{
    public function showDetail($id){
                $spdetail  = SanPhamModel::find($id);
                $idloai = $spdetail->id_loai;
        $sp = SanPhamModel::where('id_loai', $idloai)
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

                return view('cleint.sanphamct',compact('spdetail','sp'));
    }
}
