<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Schema;
use Illuminate\Support\Facades\Redirect;
use Mail; // thư viện của laravel
class LoginController extends Controller
{
    // login
    public function login(LoginRequest $request)
    {
        if ($request->isMethod('POST')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('/');
            } else {
                return redirect()->route('login')->with('error','Mật Khẩu và tài khoản không chính xác!!!');
            }
        }
        return view('login.login');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }

    // register
    public function register(LoginRequest $request)
    {
        if ($request->isMethod('POST')) {
            $gioitinh = $request->gender;
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $currentDateTime = Date::now();
            $sqlFormattedDateTime = $currentDateTime->toDateTimeString();
            if ($request->password == $request->enterpassword) {
                $result = DB::table('users')->insert([
                    'name'=>$name,
                    'sdt'=>0,
                    'diachi'=>0,
                    'gioitinh'=>$gioitinh,
                    'email'=>$email,
                    'password'=>bcrypt($password),
                    'email_verified_at'=>$sqlFormattedDateTime, //được sử dụng để đánh dấu xác nhận của người dùng với địa chỉ email của họ

                ]);
                // nếu thêm thành công thì tôi gửi mail đến mail mà user đã dùng đăng ký và sau đó
                // chuyển hướng đến trang đăng nhập
                if ($result) {
                    $name= $request->name;
                    $user = $request->email;
                    $pass = $request->password;
                    $linkweb = Redirect::route('login');
                    Mail::send('email.index',compact('name','user','pass','linkweb'),function ($email)use($request,$name){
                        $email->subject('Welcome you website me :v'); // chủ đề mail
                        $email->to($request->email,$name); // to() thứ 1 là địa chỉ người nhận
                        // tham số thứ 2 là tên người nhận
                    });// tham số thứ nhất là view , thứ 2 là biến , thứ 3 là function cục hộ
                    return redirect()->route('login')->with('msg', 'Đăng nhập để mua hàng ');
                }
            }else{
                return back()->withInput()->with('msg', 'Mật khẩu không trùng khớp');
            }


        }
        return view('login.register');
    }
}
