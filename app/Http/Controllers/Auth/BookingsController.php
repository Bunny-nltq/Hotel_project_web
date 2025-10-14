<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingsController extends Controller
{
    // 🧾 Hiển thị danh sách đặt phòng của user hiện tại
    public function index()
    {
        $bookings = Booking::with('room')
            ->where('idUser', Auth::id())
            ->orderBy('checkin_date', 'desc')
            ->get();

        // Lấy danh sách phòng để hiển thị cùng danh sách đặt phòng
        $rooms = Room::all();

        return view('User.Pages.roomBooking', compact('bookings', 'rooms'));
    }

    // 🏨 Lưu đặt phòng mới
    public function store(Request $request)
    {
        $request->validate([
            'idRoom' => 'required|exists:rooms,idRoom',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'num_people' => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($request->idRoom);

        // Tính tổng giá
        $checkin = Carbon::parse($request->checkin_date);
        $checkout = Carbon::parse($request->checkout_date);
        $days = max($checkin->diffInDays($checkout), 1);
        $total_price = $room->price_per_night * $days;

        // Tạo booking
        Booking::create([
            'idUser' => Auth::id(),
            'idRoom' => $room->idRoom,
            'checkin_date' => $checkin,
            'checkout_date' => $checkout,
            'num_people' => $request->num_people,
            'total_price' => $total_price,
            'status' => 'pending',
            'booking_date' => now(),
            'note' => $request->note ?? null,
        ]);

        // Cập nhật trạng thái phòng
        $room->update(['status' => 'booked']);

        // Quay lại danh sách phòng
        return redirect()->route('user.rooms')->with('success', 'Đặt phòng thành công!');
    }

    // 🧑‍💼 Admin xem tất cả các đặt phòng
    public function adminIndex()
    {
        $bookings = Booking::with(['room', 'user'])
            ->orderBy('checkin_date', 'desc')
            ->get();

        return view('Admin.Bookings.index', compact('bookings'));
    }

    // ❌ Hủy đặt phòng
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        // Mở lại phòng
        if ($booking->room) {
            $booking->room->update(['status' => 'available']);
        }

        $booking->delete();

        return back()->with('success', 'Đã hủy đặt phòng!');
    }
}
