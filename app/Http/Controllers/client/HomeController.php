<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\GiohangModel;
use App\Models\LoaiModel;
use App\Models\SanPhamModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showBanner(){
        $banner = DB::table('setting')->select('imagebanner')->get();
        $loai = LoaiModel::all();
        $sp = SanPhamModel::paginate(9);

        return view('cleint.sanpham',compact('banner','loai','sp'));
    }
    public function showDM($id){
        $sp = SanPhamModel::where('id_loai',$id)->paginate(9); // show all theo loại
        $count = SanPhamModel::where('id_loai',$id)->get()->count();
        if($sp){
            Session::flash('alert','Có '.$count.' Sản Phẩm');
        }
        $banner = DB::table('setting')->select('imagebanner')->get();
        $loai = LoaiModel::all();
        return view('cleint.sanpham',compact('sp','loai','banner'));
    }
    // tìm kiếm sản phẩm theo tên
    public function  sreachSP(Request $request){
        $banner = DB::table('setting')->select('imagebanner')->get();
        $loai = LoaiModel::all();
            if(!empty($request->inputsreach) && $request->post()){
                $sp = SanPhamModel::where('tensanpham','like','%'.$request->inputsreach.'%')->paginate(9);
               return view('cleint.sanpham',compact('sp','banner','loai'));
            }else{

                $sp = SanPhamModel::all();
            }
        return view('cleint.sanpham',compact('sp','banner','loai'));

    }


}
