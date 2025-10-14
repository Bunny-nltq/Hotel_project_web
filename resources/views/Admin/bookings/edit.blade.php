@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/booking.css') }}">

<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Sửa đặt phòng</h2>

    <form action="{{ route('admin.bookings.update', $booking->idBooking) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Khách hàng</label>
            <select name="idUser" class="input-field" required>
                @foreach($users as $user)
                    <option value="{{ $user->idUser }}" {{ $booking->idUser == $user->idUser ? 'selected' : '' }}>
                        {{ $user->fullName }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Phòng</label>
            <select name="idRoom" class="input-field" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->idRoom }}" {{ $booking->idRoom == $room->idRoom ? 'selected' : '' }}>
                        {{ $room->room_number }} ({{ number_format($room->price_per_night) }} VND)
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Số người</label>
            <input type="number" name="num_people" value="{{ $booking->num_people }}" class="input-field" min="1" required>
        </div>

        <div>
            <label>Ngày nhận phòng</label>
            <input type="date" name="checkin_date" value="{{ $booking->checkin_date->format('Y-m-d') }}" class="input-field" required>
        </div>

        <div>
            <label>Giờ nhận phòng</label>
            <input type="time" name="checkin_time" value="{{ $booking->checkin_date->format('H:i') }}" class="input-field" required>
        </div>

        <div>
            <label>Ngày trả phòng</label>
            <input type="date" name="checkout_date" value="{{ $booking->checkout_date->format('Y-m-d') }}" class="input-field" required>
        </div>

        <div>
            <label>Giờ trả phòng</label>
            <input type="time" name="checkout_time" value="{{ $booking->checkout_date->format('H:i') }}" class="input-field" required>
        </div>

        <div>
            <label>Ghi chú</label>
            <textarea name="note" class="input-field">{{ $booking->note }}</textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="input-field" required>
                <option value="pending" {{ $booking->status=='pending' ? 'selected' : '' }}>Đang chờ</option>
                <option value="confirmed" {{ $booking->status=='confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="checked" {{ $booking->status=='checked' ? 'selected' : '' }}>Đã nhận phòng</option>
                <option value="cancelled" {{ $booking->status=='cancelled' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Cập nhật đặt phòng</button>
    </form>
</div>
@endsection
