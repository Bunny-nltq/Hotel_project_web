<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Đây là file routes/web.php — các route trả về view trực tiếp bằng Route::view
| phù hợp cho trang tĩnh. Nếu cần logic (DB, controller) thì chuyển sang Route::get + Controller.
|
*/

// Home
Route::view('/', 'User.Pages.home')->name('home');

// User pages
Route::view('/about', 'User.Pages.aboutUs')->name('about');
Route::view('/experience', 'User.Pages.experience')->name('experience');
Route::view('/rooms', 'User.Pages.room')->name('rooms');
Route::view('/contact', 'User.Pages.contact')->name('contact');

// Auth pages (login / register)
Route::view('/login', 'Auth.login')->name('login');
Route::view('/register', 'Auth.register')->name('register');

// If you have an escalation page in Auth folder
Route::view('/escalation', 'Auth.escalation')->name('escalation');

// Section partials (nếu bạn muốn test header/footer trực tiếp)
Route::view('/section/header', 'Section.header')->name('section.header');
Route::view('/section/footer', 'Section.footer')->name('section.footer');

// Admin area (thường bạn sẽ dùng middleware auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Nếu bạn có resources/views/Admin/dashboard.blade.php
    Route::view('/', 'Admin.dashboard')->name('admin.dashboard');
    // Thêm route admin khác ở đây...
});

/*
| Nếu muốn trả về view kèm data tĩnh, có thể dùng closure:
|
| Route::get('/example', function () {
|     return view('User.Pages.home', ['foo' => 'bar']);
| })->name('example');
|
| Khi cần logic phức tạp hãy tạo Controller và dùng:
| Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
*/
