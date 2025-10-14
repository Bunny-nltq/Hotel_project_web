<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('Admin.auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // ✅ Kiểm tra dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không hợp lệ!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự!',
        ]);

        $credentials = $request->only('email', 'password');

        // ✅ Thử đăng nhập với guard admin
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
        }

        // ❌ Nếu sai thông tin
        return back()->withErrors([
            'login_error' => 'Email hoặc mật khẩu không đúng!',
        ])->withInput();
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form')->with('success', 'Đã đăng xuất!');
    }

    // Trang dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Trang hồ sơ
    public function profile()
    {
        return view('admin.profile');
    }
}
