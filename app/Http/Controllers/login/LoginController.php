<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // login
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return  redirect()->route('/');
            }else{
               return  redirect()->route('login');
            }
        }
        return view('login.login');
    }
    // logout
    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
}
