<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if ($user) {
            session(['user_id' => $user->id]);

            // Nếu checkbox remember được tick -> tạo cookie 30 ngày
            if ($request->has('remember')) {
                $cookie = cookie('user_email', $user->email, 60 * 24 * 30); // 30 days
                return redirect('/home')->with('success', 'Đăng nhập thành công')->cookie($cookie);
            }

            return redirect('/home')->with('success', 'Đăng nhập thành công');
        } else {
            return back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
        }
    }

    // Thêm phương thức logout (xoá session + cookie)
    public function logout()
    {
        session()->flush();
        return redirect('/')->withCookie(Cookie::forget('user_email'));
    }

    public function showRegister()
    {
        return view('user.register');
    }
// dang ky
    public function register(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }

    public function listUsers()
    {
        $users = DB::table('users')->get();
        return view('userInfo', data: compact('users'));
    }
    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.info')->with('success', 'Xóa tài khoản thành công!');
    }
}