<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoaiRequest;
use App\Models\LoaiModel;
use Database\Seeders\LoaiSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class LoaiAdminController extends Controller
{
    public function showLoai()
    {
        $loai = LoaiModel::all();
        return view('category.list', compact('loai'));
    }

    // thêm loại
    public function addLoai(LoaiRequest $request)
    {

        if ($request->isMethod('POST')) {
            // $params = $request->except('_token'); // lấy dữ liệu từ form
            // xử lý ảnh
            if ($request->hasFile('hinh') && $request->file('hinh')->isValid()) {
                $request->hinh = uploadFile('hinh', $request->file('hinh'));
            }
            $params = $request->except('_token');
            $params['image'] = $request->hinh;

            $result = LoaiModel::create($params);
            if ($result) {
                Session::flash('success', 'Thêm thành công');
                return redirect()->route('danhsach');
            }

        }
        return view('category.add');
    }

    // sửa
    public function editLoai(LoaiRequest $request, $id)
    {
        $loai = LoaiModel::find($id);
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('hinh')&& $request->file('hinh')->isValid()){
               $resultDL = Storage::delete('/public/'.$loai->image);
               if($resultDL){
                   $request->hinh = uploadFile('hinh',$request->file('hinh'));
                   $params['image'] = $request->hinh;
               }
            }else{
                $params['image'] = $loai->image;
            }
            $result  = LoaiModel::find($id)->update($params);
            if($result){
                Session::flash('success', 'cập nhật thành công');
                return redirect()->route('danhsach');
            }
        }
        return view('category.edit', compact('loai'));
    }

    // xóa
    public function deleteLoai($id)
    {
        // id đón từ route
        $resultDl = LoaiModel::find($id);
        // nếu tìm thấy id
        if ($resultDl) {
            $resultDl->delete();
            Session::flash('success', 'Xóa thành công');
            return redirect()->route('danhsach');
        }
    }
    // tìm kiếm
    public function sreachLoai(Request $request){
            if($request->post() && !empty($request->inputsearch)){
                $loai = LoaiModel::where('tenloai','like','%'.$request->inputsearch.'%')->get();
                return view('category.list',compact('loai'));
            }else{
                $loai = LoaiModel::all();
            }
            return view('category.list',compact('loai'));
    }

}
