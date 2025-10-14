@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Thêm Phòng Mới</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Số phòng</label>
                <input type="text" name="room_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Loại phòng</label>
                <input type="text" name="room_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá / đêm</label>
                <input type="number" name="price_per_night" class="form-control" min="0" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số người tối thiểu</label>
                <input type="number" name="min_people" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số người tối đa</label>
                <input type="number" name="max_people" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="available">available</option>
                    <option value="booked">booked</option>
                </select>
            </div>

            <!-- 🖼️ Hình ảnh -->
            <div class="mb-3">
                <label class="form-label">Hình ảnh phòng</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection
