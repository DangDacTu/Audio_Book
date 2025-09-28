<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return redirect('/home'); // Trả về trang home
        } else {
            return back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
        }
    }

    public function showRegister()
    {
        return view('user.register');
    }

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
        return view('userInfo', compact('users'));
    }
    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.info')->with('success', 'Xóa tài khoản thành công!');
    }
}