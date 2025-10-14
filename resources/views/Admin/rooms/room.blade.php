<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phòng</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">Danh sách phòng</h2>

    <table border="1" cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Số phòng</th>
                <th>Loại phòng</th>
                <th>Giá / đêm</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->idRoom }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->room_type }}</td>
                <td>{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</td>
                <td>{{ $room->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
