<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
  {{-- Header --}}
  @include('User.Section.header')

  <!-- Banner -->
  <section class="banner">
    <img src="{{ asset('img/The-Summit-Ariel-Evening-scaled.jpg') }}" alt="Banner" class="banner-img">
    <div class="banner-content">
      <p>Dịch vụ & Tiện ích</p>
      <h1>InterContinental Danang Sun Peninsula Resort</h1>
    </div>
  </section>

  <!-- Main content -->
  <main>
    <form class="register-form" enctype="multipart/form-data" method="post" action="{{ route('register.submit') }}">
      @csrf
      <h2>ĐĂNG KÝ</h2>
      
      <div class="form-row">
        <label for="fullname">Họ và tên</label>
        <input type="text" id="fullname" name="fullname" placeholder="Nhập họ tên" required>
      </div>

      <div class="form-row">
        <label for="phone">Số điện thoại</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
      </div>

      <div class="form-row">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Nhập email" required>
      </div>

      <div class="form-row">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
      </div>

      <div class="form-row">
        <label for="confirm-password">Xác nhận mật khẩu</label>
        <input type="password" id="confirm-password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
      </div>

      <div class="form-row">
  <label for="cccd-front">Ảnh CCCD (mặt trước)</label>
  <input type="file" id="cccd-front" name="cccd_front" accept="image/*,.pdf" required>
  <img id="preview-front" class="preview-img" alt="Xem trước mặt trước CCCD">
</div>

<div class="form-row">
  <label for="cccd-back">Ảnh CCCD (mặt sau)</label>
  <input type="file" id="cccd-back" name="cccd_back" accept="image/*,.pdf" required>
  <img id="preview-back" class="preview-img" alt="Xem trước mặt sau CCCD">
</div>


      <button type="submit">ĐĂNG KÝ<a href="{{ url('/') }}"></a></button>

      <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
    </form>
  </main>
  {{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Footer CSS --}}
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

{{-- Footer --}}
@include('User.Section.footer')

{{-- Footer JS --}}
<script src="{{ asset('js/footer.js') }}"></script>


  {{-- JS --}}
  <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
