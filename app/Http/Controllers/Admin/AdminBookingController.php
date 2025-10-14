<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room', 'user')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('admin.bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idRoom' => 'required|exists:rooms,idRoom',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'num_people' => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($request->idRoom);
        $checkin = Carbon::parse($request->checkin_date);
        $checkout = Carbon::parse($request->checkout_date);

        $days = $checkin->diffInDays($checkout);
        $totalPrice = $room->price_per_night * max($days, 1);

        Booking::create([
            'idUser' => $request->idUser,
            'idRoom' => $room->idRoom,
            'checkin_date' => $checkin->format('Y-m-d H:i:s'),
            'checkout_date' => $checkout->format('Y-m-d H:i:s'),
            'num_people' => $request->num_people,
            'total_price' => $totalPrice,
            'status' => $request->status ?? 'pending',
            'note' => $request->note ?? null,
            'booking_date' => now(),
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Thêm đặt phòng thành công!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $rooms = Room::all();
        return view('admin.bookings.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $room = Room::findOrFail($request->idRoom);

        $checkin = Carbon::parse($request->checkin_date);
        $checkout = Carbon::parse($request->checkout_date);
        $days = $checkin->diffInDays($checkout);
        $totalPrice = $room->price_per_night * max($days, 1);

        $booking->update([
            'idRoom' => $room->idRoom,
            'checkin_date' => $checkin->format('Y-m-d H:i:s'),
            'checkout_date' => $checkout->format('Y-m-d H:i:s'),
            'num_people' => $request->num_people,
            'total_price' => $totalPrice,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Cập nhật đặt phòng thành công!');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Xóa đặt phòng thành công!');
    }
}
