@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">

<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Thêm khách hàng mới</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label>Họ và tên</label>
            <input type="text" name="fullName" value="{{ old('fullName') }}" class="input-field" required>
            @error('fullName') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="input-field" required>
            @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input-field" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Mật khẩu</label>
            <input type="password" name="password" class="input-field" required>
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>CCCD mặt trước</label>
            <input type="file" name="cccd_front" class="input-field">
        </div>

        <div>
            <label>CCCD mặt sau</label>
            <input type="file" name="cccd_back" class="input-field">
        </div>

        <button type="submit" class="btn-submit">Thêm khách hàng</button>
    </form>
</div>
@endsection
