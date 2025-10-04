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
    <div class="menu-left" onclick="openSidebar()">☰ <span>MENU</span></div>
    <a href="{{ url('/') }}">
      <div class="logo"><img src="{{ asset('img/logo-dark.svg') }}" alt="Resort Logo"></div>
    </a>
    <nav class="menu-right">
      <div class="login"><a href="javascript:void(0)" onclick="openLogin()">ĐĂNG NHẬP</a></div>
      <div class="booking"><a href="javascript:void(0)" onclick="openBooking()">ĐẶT PHÒNG</a></div>
    </nav>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <span class="close-btn" onclick="closeAll()">&times;</span>
    <h3>Menu</h3>
    <a href="#">Trang chủ</a>
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

  <!-- Booking Form -->
  <div class="booking-form" id="bookingForm">
    <span class="close-btn" onclick="closeAll()">&times;</span>
    <h2>ĐẶT CHỖ</h2>
    <div class="form-row">
      <div style="flex:1"><label>Nhận phòng</label><input type="date"></div>
      <div style="flex:1"><label>Trả phòng</label><input type="date"></div>
    </div>
    <div class="form-row">
      <div style="flex:1"><label>Số phòng</label>
        <select><option>1</option><option>2</option><option>3</option></select>
      </div>
      <div style="flex:1"><label>Người lớn</label>
        <select><option>1</option><option>2</option><option>3</option></select>
      </div>
      <div style="flex:1"><label>Trẻ em</label>
        <select><option>0</option><option>1</option><option>2</option></select>
      </div>
    </div>
    <button>TÌM KIẾM</button>
  </div>

  <!-- Login Form -->
  <div class="login-form" id="loginForm">
    <span class="close-btn" onclick="closeAll()">&times;</span>
    <h2>
      <a href="{{ asset('css/login.css') }}">
        ĐĂNG NHẬP
      </a>
    </h2>
    <div class="form-row"><div style="flex:1">
      <label>Email</label><input type="email" placeholder="Nhập email"></div></div>
    <div class="form-row"><div style="flex:1">
      <label>Mật khẩu</label><input type="password" placeholder="Nhập mật khẩu"></div></div>
    <button>ĐĂNG NHẬP</button>
    <p style="margin-top:10px; font-size:14px; color: #444">Chưa có tài khoản? <a href="{{route('register.form') }}">Đăng ký</a></p>
  </div>
<script src="{{ asset('js/login.js') }}"></script>

  {{-- JS --}}
  <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>
