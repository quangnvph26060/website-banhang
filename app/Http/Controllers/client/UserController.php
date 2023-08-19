<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
