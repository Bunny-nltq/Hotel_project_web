<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resort Booking</title>

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
  <!-- Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Header -->
  <header class="header" id="header">
    <a href="{{ route('home') }}">
      <div class="logo">
        <img src="{{ asset('img/logo-dark.svg') }}" alt="Resort Logo">
      </div>
    </a>

    <!-- MENU CHUYỂN TỪ TRÁI SANG PHẢI -->
    <nav class="menu-right">
      <div class="menu-toggle" onclick="openSidebar()">☰ <span>MENU</span></div>

      {{-- Kiểm tra trạng thái đăng nhập --}}
      @if(Auth::guard('hotel')->check())
    <div class="user-menu">
        <a href="{{ route('user.info') }}" class="btn-infor">Thông tin</a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Đăng xuất</button>
        </form>
    </div>
@else
    <div class="auth-buttons">
        <a href="{{ route('login.form') }}" class="btn-login">Đăng nhập</a>
        <a href="{{ route('register.form') }}" class="btn-register">Đăng ký</a>
    </div>
@endif

    </nav>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <span class="close-btn" onclick="closeAll()">&times;</span>
    <h3>Menu</h3>
    <a href="{{ route('home') }}">Trang chủ</a>
    <a href="#">Phòng & Biệt thự</a>
    <a href="#">Trải nghiệm</a>
    <a href="#">Về chúng tôi</a>
    <a href="#">Liên hệ</a>

    <div class="contact">
      <p><strong>Đặt chỗ</strong></p>
      <p>InterContinental Danang Sun Peninsula Resort</p>
      <p>Bán Đảo Sơn Trà, Đà Nẵng, 550000, Việt Nam</p>
      <p>SĐT: +84 (0) 236 393 8888 <br>
        E: <a href="mailto:reservations.icdanang@ihg.com">reservations.icdanang@ihg.com</a></p>
    </div>

    <div class="social">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
      <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
  </aside>

  {{-- JS --}}
  <script src="{{ asset('js/login.js') }}"></script>
  <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>
