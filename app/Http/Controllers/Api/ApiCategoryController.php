<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\LoaiModel;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // hiển thị
    public function index()
    {
        $category = LoaiModel::all();
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    // thêm
    public function store(Request $request)
    {
      $category = LoaiModel::create($request->all());
      return new CategoryResource($category); // hiển thị dữ liệu vừa thêm
    }

    /**
     * Display the specified resource.
     */
    // show 1 bản dữ liệu
    public function show(string $id)
    {
       $result = LoaiModel::find($id);
       if($result){
           return new CategoryResource($result);
       }else{
           return response()->json(['error','Không Tìm Thấy',404]);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    // cập nật bản ghi vừa tìm thấy
    public function update(Request $request, string $id)
    {
        $result = LoaiModel::find($id);
        if($result){
            $result->update($request->all());
            return new CategoryResource($result);
        }else{
            return response()->json(['error','Không Tìm Thấy',404]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = LoaiModel::find($id);
        if($result){
            $result->delete();
            return response()->json(['success','Xóa thành công',200]);
        }else{
            return response()->json(['error','Không Tìm Thấy',404]);
        }
    }
}
