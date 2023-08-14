<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
   public function showBanner(){
        $banner = SettingModel::all();
        return view('setting.list',compact('banner'));
   }
    public function addBanner (BannerRequest $request ){
       if($request->isMethod('POST')){
//           $params = $request->except('_token');

           if($request->hasFile('hinh')&&$request->file('hinh')->isValid()){
               $request->hinh = uploadFile('hinh',$request->file('hinh'));

           }
//           $params['imagebanner'] = $request->imagebanner;
//           $result = SettingModel::create($params);
           $result = DB::table('setting')->insert([
               'imagebanner'=>$request->hinh,
               'logo'=>"",
           ]);
           if($result){
               Session::flash('success', 'Thêm thành công');
               return redirect()->route('list');
           }
       }
            return view('setting.add');
    }
    // sửa
    public function editBanner(BannerRequest $request, $id){
       $banner = SettingModel::find($id);
       if($request->isMethod('POST')){
           // xư lý ảnh
           if($request->hasFile('hinh') && $request->file('hinh')->isValid()){
               $resultDl  = Storage::delete('public'.$banner->imagebanner);
               if($resultDl){
                   $request->hinh = uploadFile('hinh',$request->file('hinh'));
               }
           }else{
               $request->hinh = $banner->imagebanner;
           }
                $affected = SettingModel::find($id)->update([
                    'imagebanner'=>$request->hinh,
                ]);
           if($affected){
               Session::flash('success', 'Cập Nhật thành công');
               return redirect()->route('list');
           }
       }
       return view('setting.edit',compact('banner'));
    }
}
