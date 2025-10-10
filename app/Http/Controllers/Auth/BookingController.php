<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    // Hiển thị form đặt phòng
    public function showForm($idRoom)
    {
        $room = Room::findOrFail($idRoom);
        return view('User.Booking.form', compact('room'));
    }

    // Xử lý đặt phòng
    public function store(Request $request)
    {
        $request->validate([
            'idRoom' => 'required|exists:rooms,idRoom',
            'num_people' => 'required|integer|min:1',
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
        ]);

        $user = Auth::guard('hotel')->user();

        Booking::create([
            'idUser' => $user->idUser,
            'idRoom' => $request->idRoom,
            'num_people' => $request->num_people,
            'booking_date' => now(),
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'status' => 'pending',
        ]);

        return redirect()->route('user.info')->with('success', 'Đặt phòng thành công!');
    }
}
