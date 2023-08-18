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
class LoginController extends Controller
{
    // login
    public function login(LoginRequest $request)
    {
        if ($request->isMethod('POST')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('/');
            } else {
                return redirect()->route('login');
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
    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $gioitinh = $request->gender;
            $name = $request->name;
            $email = $request->email;
            $password = bcrypt($request->password);
            $currentDateTime = Date::now();
            $sqlFormattedDateTime = $currentDateTime->toDateTimeString();
            if ($request->password == $request->enterpassword) {
                $result = DB::table('users')->insert([
                    'name'=>$name,
                    'sdt'=>0,
                    'diachi'=>0,
                    'gioitinh'=>$gioitinh,
                    'email'=>$email,
                    'password'=>$password,
                    'email_verified_at'=>$sqlFormattedDateTime,


                ]);
                if ($result) {
                    return redirect()->route('login')->with('msg', 'Đăng nhập để mua hàng ');
                }
            } else {
//                return redirect()->route('register')->with('msg', 'Mật Khẩu không chính xác');
            }

        }
        return view('login.register');
    }
}
