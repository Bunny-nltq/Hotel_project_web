<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            height: 100vh;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 5px;
            margin: 4px 0;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            padding: 25px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h5 class="text-center text-white">Admin Panel</h5>
            <a href="{{ route('admin.rooms.index') }}">🏨 Quản lý Phòng</a>
            <a href="{{ route('admin.users.index') }}">👤 Quản lý Khách hàng</a>
            <a href="{{ route('admin.bookings.index') }}">📅 Quản lý Booking</a>
            <a href="#">📞 Liên hệ</a>
        </div>

        <!-- Main content -->
        <div class="col-md-10 content">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
