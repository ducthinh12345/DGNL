<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//user model can kiem tra
use Auth; //use thư viện auth
// use App\Http\Middleware\checkAdminLogin;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('auth/login');//return ra trang login để đăng nhập
    }
    public function adminlogin()
    {
        return view('admin/homeadmin');//return ra trang login để đăng nhập
    }
    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('users')->attempt($arr)) {

            // dd('đăng nhập thành công');

            //..code tùy chọn\
            return redirect()->route('check');
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

            dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}
