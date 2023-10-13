<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
     //  Role::create(['name' => 'khach hang']); // tạo roles vai trò
     //Permission::create(['name' => 'show']); // tạo Permission
        $role = Role::find(1);
        $permission = Permission::find(5);
        //thêm

       //  $role->givePermissionTo($permission); // cấp  vai trò cho quyền
        // $permission->assignRole($role); //thêm quyền cho vai trò
        // xóa
        //  $role->revokePermissionTo($permission); xóa vai trò có quyền gì
        //   $permission->removeRole($role); xóa quyền  có vai trò  gì

     //  auth('web')->user()->assignRole('nhan vien'); // cung cấp vai trò cho user
  // auth('web')->user()->givePermissionTo('show'); // cấp quyền cho user đó
        //hasAnyrole check xem người dùng có bất kỳ vai trò nào trong danh sách
        //auth('web')->user()->hasExactRoles(['admin','editer']) kiểm tra xem user đó có tất cả quyền đấy không chính xác
        //hasRole check xem có vai trò đó hay không nếu muốn check xem có các vai trò hay không thì cho vào []
        //givePermissionTo check xem có quyền gì
      // dd(auth('web')->user()->givePermissionTo()); // xem có những quyền gì
       // dd(auth('web')->user()->getPermissionsViaRoles()); // Quyền được kế thừa từ vai trò của người dùng

     //dd(auth('web')->user()->getAllPermissions()); //Tất cả các quyền áp dụng cho người dùng (kế thừa và trực tiếp
        return view('user.index');
    }

    public function listUser()
    {
        $user = User::all();
        return view('user.list', compact('user'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->isMethod('POST')) {
            $result = DB::table('users')->where('id', $id)->update([
                'name' => $request->ten,
                'diachi' => $request->diachi,
                'gioitinh' => $request->gender,
                'email' => $request->email,
                'role' => $request->role,
                'sdt' => $request->sdt,
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


        return view('user.edit', compact('user'));
    }
}
