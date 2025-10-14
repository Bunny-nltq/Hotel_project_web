@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4>Chỉnh Sửa Phòng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.rooms.update', $room->idRoom) }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <div class="mb-3">
                <label class="form-label">Số phòng</label>
                <input type="text" name="room_number" value="{{ $room->room_number }}" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Loại phòng</label>
                <input type="text" name="room_type" value="{{ $room->room_type }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá / đêm</label>
                <input type="number" name="price_per_night" value="{{ $room->price_per_night }}" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số người tối thiểu</label>
                <input type="number" name="min_people" value="{{ $room->min_people }}" class="form-control" min="1">
            </div>

            <div class="mb-3">
                <label class="form-label">Số người tối đa</label>
                <input type="number" name="max_people" value="{{ $room->max_people }}" class="form-control" min="1">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3">{{ $room->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>available</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>booked</option>
                </select>
            </div>

            <!-- 🖼️ Hình ảnh -->
            <div class="mb-3">
                <label class="form-label">Hình ảnh phòng</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($room->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="Ảnh phòng" width="120" class="rounded">
                    </div>
                @endif
            </div>

            <!-- 🕓 Thông tin cập nhật -->
            <div class="mb-3 text-muted small">
                <p><strong>Thêm lúc:</strong> {{ $room->created_at->format('H:i d/m/Y') }}</p>
                <p><strong>Cập nhật lần cuối:</strong> {{ $room->updated_at->format('H:i d/m/Y') }}</p>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection
