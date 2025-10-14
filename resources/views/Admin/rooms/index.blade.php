@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/room.css') }}">

<div class="container mx-auto mt-8 px-4">
    {{-- 🔹 Header + nút thêm phòng --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-3">
        <h2 class="text-2xl font-bold text-gray-700 text-center md:text-left">Danh sách phòng</h2>
        <a href="{{ route('admin.rooms.create') }}" class="btn-add-room">
            + Thêm phòng mới
        </a>
    </div>

    {{-- 🔹 Bảng danh sách phòng --}}
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full border border-gray-300 bg-white">
            <thead class="bg-gray-800 text-black text-center text-sm md:text-base">
                <tr>
                    <th>Số phòng</th>
                    <th>Ảnh</th>
                    <th>Tình trạng</th>
                    <th>Giá (VND)</th>
                    <th>Loại phòng</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody class="text-center text-sm md:text-base">
                @foreach($rooms as $room)
                <tr class="border-b hover:bg-gray-100 transition duration-200">
                    <td class="font-semibold text-gray-700 whitespace-nowrap">{{ $room->room_number }}</td>

                    {{-- Ảnh phòng --}}
                    <td>
                        @if($room->image)
                            <div class="room-image-wrapper">
                                <img src="{{ asset('storage/rooms/' . $room->image) }}" 
                                     alt="Phòng {{ $room->room_number }}"
                                     class="room-image">
                            </div>
                        @else
                            <span class="text-gray-400 italic">Không có ảnh</span>
                        @endif
                    </td>

                    {{-- Tình trạng --}}
                    <td>
                        @if($room->status === 'available')
                            <span class="status-badge available">Trống</span>
                        @elseif($room->status === 'booked')
                            <span class="status-badge booked">Đã đặt</span>
                        @endif
                    </td>

                    {{-- Giá --}}
                    <td class="text-green-600 font-medium whitespace-nowrap">
                        {{ number_format($room->price_per_night) }}
                    </td>

                    {{-- Loại phòng --}}
                    <td class="capitalize whitespace-nowrap">
                        {{ $room->room_type }}
                    </td>

                    {{-- Mô tả --}}
                    <td class="text-gray-600 max-w-[200px] truncate" title="{{ $room->description }}">
                        {{ $room->description }}
                    </td>

                    {{-- Hành động --}}
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.rooms.edit', $room->idRoom) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('admin.rooms.destroy', $room->idRoom) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa phòng này không?')">
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
