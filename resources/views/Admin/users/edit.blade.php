@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">

<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Sửa thông tin khách hàng</h2>

    <form action="{{ route('users.update', $user->idUser) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Họ và tên</label>
            <input type="text" name="fullName" value="{{ old('fullName', $user->fullName) }}" class="input-field" required>
            @error('fullName') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="input-field" required>
            @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input-field" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>CCCD mặt trước</label>
            <input type="file" name="cccd_front" class="input-field">
            @if($user->cccd_front)
            <img src="{{ asset('storage/cccd/' . $user->cccd_front) }}" class="cccd-image mt-2" alt="CCCD trước">
            @endif
        </div>

        <div>
            <label>CCCD mặt sau</label>
            <input type="file" name="cccd_back" class="input-field">
            @if($user->cccd_back)
            <img src="{{ asset('storage/cccd/' . $user->cccd_back) }}" class="cccd-image mt-2" alt="CCCD sau">
            @endif
        </div>

        <button type="submit" class="btn-submit">Cập nhật</button>
    </form>
</div>
@endsection
