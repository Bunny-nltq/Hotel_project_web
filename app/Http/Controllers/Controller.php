<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Trang đăng ký
    public function showRegister() {
        return view('User.Auth.register');
    }

    // Xử lý đăng ký
    public function registerSubmit(Request $request) {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'cccd_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'cccd_back' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Lưu ảnh
        $frontPath = $request->file('cccd_front')->store('cccd', 'public');
        $backPath = $request->file('cccd_back')->store('cccd', 'public');

        // Lưu user
        $user = new User();
        $user->name = $request->fullname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->cccd_front = $frontPath;
        $user->cccd_back = $backPath;
        $user->save();

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Mời bạn đăng nhập.');
    }

    // Trang đăng nhập
    public function showLogin() {
        return view('User.Auth.login');
    }

    // Xử lý đăng nhập
    public function loginSubmit(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    // Đăng xuất
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
