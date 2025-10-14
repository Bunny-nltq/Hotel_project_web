@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/booking.css') }}">

<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Thêm đặt phòng mới</h2>

    <form action="{{ route('admin.bookings.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Khách hàng</label>
            <select name="idUser" class="input-field" required>
                <option value="">-- Chọn khách hàng --</option>
                @foreach($users as $user)
                    <option value="{{ $user->idUser }}" {{ old('idUser') == $user->idUser ? 'selected' : '' }}>
                        {{ $user->fullName }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('idUser') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Phòng</label>
            <select name="idRoom" class="input-field" required>
                <option value="">-- Chọn phòng --</option>
                @foreach($rooms as $room)
                        <option value="{{ $room->idRoom }}">{{ $room->room_number }} - {{ number_format($room->price_per_night) }} VND</option>
                        {{ $room->room_number }} ({{ number_format($room->price_per_night) }} VND)
                    </option>
                @endforeach
            </select>
            @error('idRoom') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Số người</label>
            <input type="number" name="num_people" value="{{ old('num_people') }}" class="input-field" min="1" required>
            @error('num_people') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Ngày nhận phòng</label>
            <input type="date" name="checkin_date" value="{{ old('checkin_date') }}" class="input-field" required>
        </div>

        <div>
            <label>Giờ nhận phòng</label>
            <input type="time" name="checkin_time" value="{{ old('checkin_time') }}" class="input-field" required>
        </div>

        <div>
            <label>Ngày trả phòng</label>
            <input type="date" name="checkout_date" value="{{ old('checkout_date') }}" class="input-field" required>
        </div>

        <div>
            <label>Giờ trả phòng</label>
            <input type="time" name="checkout_time" value="{{ old('checkout_time') }}" class="input-field" required>
        </div>

        <div>
            <label>Ghi chú</label>
            <textarea name="note" class="input-field">{{ old('note') }}</textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="input-field" required>
                <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Đang chờ</option>
                <option value="confirmed" {{ old('status')=='confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="checked" {{ old('status')=='checked' ? 'selected' : '' }}>Đã nhận phòng</option>
                <option value="cancelled" {{ old('status')=='cancelled' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Thêm đặt phòng</button>
    </form>
</div>
@endsection
