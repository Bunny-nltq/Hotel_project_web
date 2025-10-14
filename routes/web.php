<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\BookingsController;
use App\Http\Controllers\Auth\RoomController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReportController;

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

// === USER ROUTES ===
Route::get('/rooms', [RoomController::class, 'roomBooking'])->name('user.rooms');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('user.rooms.show');
Route::get('/rooms/{room}/check', [RoomController::class, 'checkAvailability'])->name('user.rooms.check');

Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings.index')->middleware('auth');
Route::post('/bookings', [BookingsController::class, 'store'])->name('bookings.store')->middleware('auth');


// ===== TEST PHẦN HEADER / FOOTER =====
Route::view('/section/header', 'Section.header')->name('section.header');
Route::view('/section/footer', 'Section.footer')->name('section.footer');

// ===== NẾU MUỐN XEM TRANG KHÁC (ESCLATION HOẶC KHẨN CẤP) =====
Route::view('/escalation', 'Auth.escalation')->name('escalation');




// === ADMIN ROUTES ===
Route::prefix('admin')->name('admin.')->group(function () {
    // === Auth ===
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // === Dashboard ===
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/report/export', [DashboardController::class, 'exportReport'])->name('report.export');

    // === Trang hồ sơ admin ===
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');

    // === Quản lý phòng === 🏨
    Route::get('/rooms', [AdminRoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [AdminRoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [AdminRoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [AdminRoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [AdminRoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{id}', [AdminRoomController::class, 'destroy'])->name('rooms.destroy');

Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [AdminBookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [AdminBookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [AdminBookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [AdminBookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');


Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

});
