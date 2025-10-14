<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/admin/header.css') }}">
</head>

<body>
  <!-- Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Header -->
  <header class="header" id="header">
    <a href="{{ route('admin.dashboard') }}">
      <div class="logo">
        <img src="{{ asset('img/logo-dark.svg') }}" alt="Admin Logo">
      </div>
    </a>

    <!-- MENU BÊN PHẢI -->
    <nav class="menu-right">
      <div class="menu-toggle" onclick="openSidebar()">☰ <span>MENU</span></div>

     <div class="user-menu">
  <a href="{{ route('admin.profile') }}" class="btn-infor">Thông tin</a>

  <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn-logout">Đăng xuất</button>
  </form>
</div>

    </nav>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <span class="close-btn" onclick="closeAll()">&times;</span>
    <h3>Admin Menu</h3>
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="{{ route('admin.rooms.index') }}"><i class="fa-solid fa-bed"></i> Quản lý phòng</a>
    <a href="{{ route('admin.bookings.index') }}"><i class="fa-solid fa-book"></i> Đặt phòng</a>
    <a href="{{ route('admin.users.index') }}"><i class="fa-solid fa-users"></i> Người dùng</a>
    <a href="{{ route('admin.reports.index') }}"><i class="fa-solid fa-file-alt"></i> Báo cáo</a>

    <div class="contact">
      <p><strong>Liên hệ kỹ thuật</strong></p>
      <p>Email: <a href="mailto:admin@resort.vn">admin@resort.vn</a></p>
    </div>
  </aside>

  {{-- JS --}}
  <script src="{{ asset('js/admin-header.js') }}"></script>
</body>
</html>
