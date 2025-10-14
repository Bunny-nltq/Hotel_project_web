@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">

<div class="container mx-auto mt-8 px-4">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-3">
        <h2 class="text-2xl font-bold text-gray-700">Danh sách khách hàng</h2>
        <a href="{{ route('admin.users.create') }}" class="btn-add-user">+ Thêm khách hàng</a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full border border-gray-300 bg-white">
            <thead class="bg-gray-800 text-black text-center text-sm md:text-base">
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>CCCD (trước)</th>
                    <th>CCCD (sau)</th>
                    <th>Ngày đăng ký</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody class="text-center text-sm md:text-base">
                @foreach($users as $user)
                <tr class="border-b hover:bg-gray-100 transition duration-200">
                    <td>{{ $user->idUser }}</td>
                    <td>{{ $user->fullName }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
    @if($user->cccd_front)
        <div class="cccd-image-wrapper">
            <img src="{{ asset('storage/' . $user->cccd_front) }}" class="cccd-image" alt="CCCD trước">
        </div>
    @else
        <span class="text-gray-400 italic">Không có</span>
    @endif
</td>

                    <td>
                        @if($user->cccd_back)
                        <img src="{{ asset('storage/cccd/' . $user->cccd_back) }}" class="cccd-image" alt="CCCD sau">
                        @else
                        <span class="text-gray-400 italic">Không có</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('H:i d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.users.edit', $user->idUser) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('admin.users.destroy', $user->idUser) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa khách hàng này không?')">
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
