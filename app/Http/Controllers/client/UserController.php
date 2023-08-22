<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function UpdateNameUser(Request $request)
    {
        if ($request->isMethod('POST')) {
            $userId = auth::id(); // id mà user đó đăng nhập vào
            $user = User::find($userId);
            $result = $user->update(['name' => $request->name]);
            // nếu update thành công
            if ($result) {
                return redirect()->route('userdetail');
            }
        }
    }

    public function UpdateAddress(Request $request)
    {
        if ($request->isMethod('POST')) {
            $userId = auth::id(); // id mà user đó đăng nhập vào
            $user = User::find($userId);
            $result = $user->update(['diachi' => $request->diachi]);
            // nếu update thành công
            if ($result) {
                return redirect()->route('userdetail');
            }
        }
    }

    public function UpdatePhone(Request $request)
    {
        if ($request->isMethod('POST')) {
            $userId = auth::id(); // id mà user đó đăng nhập vào
            $user = User::find($userId);

            $result = $user->update(['sdt' => $request->sdt]);
            // nếu update thành công
            if ($result) {
                return redirect()->route('userdetail');
            }
        }
    }

    // đổi mật khảu
    public function changePassWord()
    {
        return view('login.changepass');
    }
    public function ChangePassEdit(ChangePassRequest $request){
        $password = $request->password; // pass cũ
        $passwordnew = $request->passwordnew; // pass mới
        $passwordconfirm = $request->passwordconfirm; // xác nhận pass mới
        $user = Auth::user();//là một cách để truy cập thông tin của người dùng
       // hiện tại đang được xác thực trong hệ thống.

        // kiểm tra mật khẩu nhập vào có trùng với mt khẩu trong DB hay không
        if(Hash::check($password,$user->password)){

            if($passwordnew == $passwordconfirm){
                $user = Auth::user();
                $result =  $user->update(['password'=>bcrypt($passwordnew)]);
                // neu thành công hiển thị thông báo
                if($result){
                    return redirect()->back()->with('error', 'đổi mật khẩu thành công.');
                }
            }else{
                return redirect()->back()->with('error', 'Mật khẩu không trùng nhau.');
            }
        }else{
             return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác.');
        }

    }
}
