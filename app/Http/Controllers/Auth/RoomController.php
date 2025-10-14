<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class RoomController extends Controller
{
    // 🏠 Hiển thị danh sách phòng
    public function roomBooking()
    {
        $rooms = Room::all();
        return view('User.Pages.roomBooking', compact('rooms'));
    }

    // 🔍 Xem chi tiết phòng
    public function show(Room $room, Request $request)
    {
        $isAuth = auth()->check();
        $user = $isAuth ? auth()->user() : null;
        $openBooking = $request->query('open_booking', false);

        return view('User.Pages.roomDetail', compact('room', 'isAuth', 'user', 'openBooking'));
    }

    // 📅 Kiểm tra phòng còn trống
    public function checkAvailability(Request $request, Room $room)
    {
        $checkin = $request->query('checkin_date');
        $checkout = $request->query('checkout_date');

        if (!$checkin || !$checkout) {
            return response()->json(['available' => false, 'message' => 'Thiếu ngày nhận hoặc trả phòng.']);
        }

        // Tìm các booking trùng thời gian
        $conflict = Booking::where('idRoom', $room->idRoom)
            ->whereIn('status', ['pending', 'confirmed', 'checked'])
            ->whereRaw("NOT (checkout_date <= ? OR checkin_date >= ?)", [$checkin, $checkout])
            ->exists();

        return response()->json(['available' => !$conflict]);
    }
}
