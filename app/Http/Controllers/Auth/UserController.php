<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class UserController extends Controller
{
  public function info()
{
    $user = Auth::guard('hotel')->user();

    if (!$user) {
        return redirect()->route('login.form')->with('error', 'Vui lòng đăng nhập để xem thông tin.');
    }

    $bookings = Booking::where('idUser', $user->idUser)
        ->with('room')
        ->get();

    return view('User.Pages.inforUser', compact('user', 'bookings'));
}

public function updateInfo(Request $request)
{
    $user = Auth::guard('hotel')->user();

    // ✅ Cập nhật thông tin đúng với cột trong bảng
    $user->update([
        'fullName' => $request->fullName,
        'phone' => $request->phone,
    ]);

    // ✅ Upload ảnh (nếu có)
    if ($request->hasFile('cccd_front')) {
        $user->cccd_front = $request->file('cccd_front')->store('cccd', 'public');
    }

    if ($request->hasFile('cccd_back')) {
        $user->cccd_back = $request->file('cccd_back')->store('cccd', 'public');
    }

    $user->save();

    return back()->with('success', 'Cập nhật thông tin thành công!');
}



    public function exportExcel() { /* TODO */ }

    public function exportPDF() { /* TODO */ }
}
