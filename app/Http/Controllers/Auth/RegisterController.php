<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký
     */
    public function showRegisterForm()
    {
        return view('Auth.register'); // file: resources/views/Auth/register.blade.php
    }

    /**
     * Xử lý đăng ký
     */
    public function register(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'fullname'          => 'required|string|max:255',
            'phone'             => 'required|string|max:20|unique:users,phone',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|string|min:6|confirmed',
            'cccd_front'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'cccd_back'         => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Lưu file CCCD
        $cccdFrontPath = $request->file('cccd_front')->store('uploads/cccd', 'public');
        $cccdBackPath  = $request->file('cccd_back')->store('uploads/cccd', 'public');

        // Tạo user mới
        $user = User::create([
            'fullname'   => $request->fullname,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'cccd_front' => $cccdFrontPath,
            'cccd_back'  => $cccdBackPath,
        ]);

        // Đăng nhập luôn sau khi đăng ký (nếu muốn)
        auth()->login($user);

        return redirect()->route('home')->with('success', 'Đăng ký thành công!');
    }
}
