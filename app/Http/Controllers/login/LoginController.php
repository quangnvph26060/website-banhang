<?php

namespace App\Http\Controllers\login;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\KhachHangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Mail;
use Illuminate\Support\Str;


// thư viện của laravel
class LoginController extends Controller
{
    // login
    public function login(LoginRequest $request)
    {

        if ($request->isMethod('POST')) {

            if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])
            ||  Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])

            ) {
                return redirect()->route('/');
            } else {
                return redirect()->route('login')->with('error', 'Mật Khẩu và tài khoản không chính xác!!!');
            }
        }
        return view('login.login');
    }

    // logout
    public function logout()
    {
        Auth::guard('client')->logout();
        Auth::guard('web')->logout();
        return redirect('/');
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
                    'name' => $name,
                    'sdt' => 0,
                    'diachi' => 0,
                    'gioitinh' => $gioitinh,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'email_verified_at' => $sqlFormattedDateTime, //được sử dụng để đánh dấu xác nhận của người dùng với địa chỉ email của họ

                ]);
                // nếu thêm thành công thì tôi gửi mail đến mail mà user đã dùng đăng ký và sau đó
                // chuyển hướng đến trang đăng nhập
                if ($result) {
                    $name = $request->name;
                    $user = $request->email;
                    $pass = $request->password;
                    $linkweb = Redirect::route('login');
                    Mail::send('email.index', compact('name', 'user', 'pass', 'linkweb'), function ($email) use ($request, $name) {
                        $email->subject('Welcome you website me :v'); // chủ đề mail
                        $email->to($request->email, $name); // to() thứ 1 là địa chỉ người nhận
                        // tham số thứ 2 là tên người nhận
                    });// tham số thứ nhất là view , thứ 2 là biến , thứ 3 là function cục hộ
                    return redirect()->route('login')->with('msg', 'Đăng nhập để mua hàng ');
                }
            } else {
                return back()->withInput()->with('msg', 'Mật khẩu không trùng khớp');
            }


        }
        return view('login.register');
    }

    // chức năng lấy lại mật khẩu
    public function RetrivealPassword()
    {
        $fl = 1;
        $email = "";
        return view('login.retrivealpassword', compact('fl', 'email'));
    }

    public function resetpassword(Request $request)
    {
        $mail = $request->email;
        session(['email' => $mail]);
        $user = User::where('email', 'like', '%' . $mail . '%')->first();

        if ($user) {
            $fl = 0;
            $email = $user->email; // là mail trong DB khi so sánh xem có trùng với mail nhập vào hay không
            $maxacnhan = random_int(0, 99999);
            session(['maxacnhan' => $maxacnhan]); // cho mã xác nhận vào session
            Mail::send('email.maxacnhan', compact('maxacnhan'), function ($email) use ($mail) {
                $email->subject('Mã Xác Nhận');// chủ đề mail
                $email->to($mail);
            });
            return view('login.retrivealpassword', compact('fl', 'email'));
        } else {
            return back()->with('msg', 'Email chưa được kích hoạt tài khoản');
        }
        $fl = 1;
        $email = "";
        return view('login.retrivealpassword', compact('fl', 'email'));
    }

    // xác nhận mã để cấp mật khẩu mới
    public function ConfrimMail(Request $request)
    {
        $confrimpass = $request->maxacnhan; // ô input
        $maxacnhan = session('maxacnhan'); // truy xuất giá trị maxacnhan
        $mail = session('email');// truy xuất giá trị email
        $password = random_int(0, 99999); // mật khẩu mới là  số ngẫu nhiên
        $resetpass = User::where('email', 'like', '%' . $mail . '%')->first(); // tìm trong DB lấy ra bản ghi có cùng email vào cập nhật mật khẩu mới
        $resetpass->update(['password' => bcrypt($password)]); // mã hóa mật khẩu
        // nếu mã xác nhận nhập vào bằng với mã xác nhận mà email gửi về thì ta thực hiện
        if ($confrimpass == $maxacnhan) {
            Mail::send('email.resetmail', compact('password'), function ($email) use ($mail) {
                $email->subject('Cung cấp mật khẩu Mới'); // tiêu đề email
                $email->to($mail);
            });
            return redirect()->route('login');
        } else {
            // redirect lại trang quên mật khẩu làm lại từng bước 1
            return redirect(route('mk'))
                ->with('msg', 'Bạn Vừa Nhập sai mã vui lòng thực hiện lại cấc bước ');
        }
    }

//    login bằng google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
            $resultUser = User::where('email', $user->getEmail())->first();

            if($resultUser){
                $resultUser->update(['name' => $user->name]);
                Auth::login($resultUser);
                return redirect('/');
            }else{
                $user = User::create([
                    'name' =>$user->name,
                    'sdt'=>'',
                    'diachi'=>'',
                    'role'=>'0',
                    'password'=> bcrypt($user->getEmail()),
                    'email' => $user->getEmail(),
                    'email_verified'=> $user->user['email_verified'],
                    'remember_token' => $user->token,
                ]);
            }
            Auth::login($user);
            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
