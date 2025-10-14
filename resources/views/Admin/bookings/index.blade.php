@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/booking.css') }}">

<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Danh sách đặt phòng</h2>
        <a href="{{ route('admin.bookings.create') }}" class="btn-add-room">+ Thêm booking</a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full border border-gray-300 bg-white">
            <thead class="bg-gray-800 text-white text-center">
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Phòng</th>
                    <th>Số người</th>
                    <th>Ngày đặt</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Tổng tiền</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($bookings as $booking)
                <tr class="border-b hover:bg-gray-100">
                    <td>{{ $booking->idBooking }}</td>
                    <td>{{ $booking->user->fullName ?? 'N/A' }}</td>
                    <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
                    <td>{{ $booking->num_people }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('H:i d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->checkin_date)->format('H:i d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->checkout_date)->format('H:i d/m/Y') }}</td>
                    <td>{{ number_format($booking->total_price) }} VND</td>
                    <td>{{ $booking->note ?? '-' }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        <div class="action-buttons flex gap-2 justify-center">
                            <a href="{{ route('admin.bookings.edit', $booking->idBooking) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('admin.bookings.destroy', $booking->idBooking) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa booking này không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
