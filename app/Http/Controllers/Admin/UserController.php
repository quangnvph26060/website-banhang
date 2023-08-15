<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function listUser(){
        $user = User::all();
        return view('user.list',compact('user'));
    }
    public function editUser (Request $request, $id){
            $user = User::find($id);

        if ($request->isMethod('POST')) {
            $result = DB::table('users')->where('id', $id)->update([
                'name' => $request->ten,
                'diachi' => $request->diachi,
                'gioitinh' => $request->gender,
                'email' => $request->email,
                'role' => $request->role,
                'sdt'=>$request->sdt,
                'password' => $user->password,
            ]);
            if ($result) {
                Session::flash('success', 'Cập nhật   thành công ');
                return redirect()->route('listuser');
            }
        }

//                if($result){
//                    Session::flash('success','Cập nhật thành công ');
//                    return redirect(route('listuser'));
//                }


            return view('user.edit',compact('user'));
    }
}
