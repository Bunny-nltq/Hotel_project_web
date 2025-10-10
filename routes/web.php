<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===== TRANG CHÍNH (ai cũng xem được) =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'User.Pages.aboutUs')->name('about');
Route::view('/experience', 'User.Pages.experience')->name('experience');
Route::view('/rooms', 'User.Pages.room')->name('rooms');
Route::view('/contact', 'User.Pages.contact')->name('contact');

// ===== ĐĂNG NHẬP / ĐĂNG KÝ =====
// Chỉ cho người CHƯA đăng nhập xem form
Route::middleware('guest:hotel')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// ===== ĐĂNG XUẤT =====
Route::post('/logout', function () {
    Auth::guard('hotel')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('home')->with('success', 'Đã đăng xuất thành công!');
})->name('logout');

// ===== TRANG CẦN ĐĂNG NHẬP =====
Route::middleware('auth:hotel')->group(function () {
    Route::get('/user/info', [UserController::class, 'info'])->name('user.info');
    Route::post('/customer/update', [UserController::class, 'updateInfo'])->name('user.updateInfo');
    Route::post('/export/pdf', [UserController::class, 'exportPDF'])->name('user.exportPDF');
});


Route::middleware('auth:hotel')->group(function () {
    // Trang form đặt phòng
    Route::get('/booking/{idRoom}', [BookingController::class, 'showForm'])->name('booking.form');
    
    // Gửi form đặt phòng
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});

// ===== ADMIN (chỉ khi đăng nhập mới truy cập được) =====
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/', 'Admin.dashboard')->name('admin.dashboard');
});

// ===== TEST PHẦN HEADER / FOOTER =====
Route::view('/section/header', 'Section.header')->name('section.header');
Route::view('/section/footer', 'Section.footer')->name('section.footer');

// ===== NẾU MUỐN XEM TRANG KHÁC (ESCLATION HOẶC KHẨN CẤP) =====
Route::view('/escalation', 'Auth.escalation')->name('escalation');
