<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Hiển thị form đăng ký
    public function showRegister()
    {
        return view('Auth.register');
    }

    // Xử lý đăng ký
    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'cccd_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'cccd_back' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'cccd_front.required' => 'Vui lòng tải lên CCCD mặt trước',
            'cccd_back.required' => 'Vui lòng tải lên CCCD mặt sau',
        ]);

        $frontPath = $request->file('cccd_front')->store('cccd', 'public');
        $backPath = $request->file('cccd_back')->store('cccd', 'public');

        $user = User::create([
            'fullname' => $validated['fullname'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cccd_front' => $frontPath,
            'cccd_back' => $backPath,
        ]);

        return redirect()->route('login.form')->with('success', 'Đăng ký thành công! Mời bạn đăng nhập.');
    }

    // Hiển thị form login
    public function showLogin()
    {
        return view('Auth.login');
    }

public function loginSubmit(Request $request)
{
    // 1️⃣ Kiểm tra dữ liệu nhập
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không hợp lệ',
        'password.required' => 'Vui lòng nhập mật khẩu',
    ]);

    $remember = $request->boolean('remember');

    // 2️⃣ Dùng guard 'web' (mặc định)
    if (Auth::guard('hotel')->attempt($credentials, $remember)) {
        $request->session()->regenerate();

        // 3️⃣ Chuyển về trang chủ sau khi đăng nhập thành công
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    // 4️⃣ Nếu đăng nhập thất bại
    return back()->withErrors([
        'email' => 'Email hoặc mật khẩu không chính xác.',
    ])->onlyInput('email');
}


    // Logout
    public function logout(Request $request)
    {
    Auth::guard('hotel')->logout(); // Đúng guard
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }
}
