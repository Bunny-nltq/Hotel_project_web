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
      <p>Đăng ký thành viên</p>
      <h1>InterContinental Danang Sun Peninsula Resort</h1>
    </div>
  </section>

  <!-- Main content -->
  <main>
    {{-- ⚙️ Gửi form đúng kiểu POST + có CSRF --}}
    <form class="register-form" enctype="multipart/form-data" method="POST" action="{{ route('register.submit') }}">
      @csrf
      <h2>ĐĂNG KÝ</h2>

      {{-- Họ và tên --}}
      <div class="form-row">
        <label for="fullname">Họ và tên</label>
        <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Nhập họ tên" required>
        @error('fullname')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- Số điện thoại --}}
      <div class="form-row">
        <label for="phone">Số điện thoại</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại" required>
        @error('phone')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- Email --}}
      <div class="form-row">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
        @error('email')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- Mật khẩu --}}
      <div class="form-row">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        @error('password')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- Xác nhận mật khẩu --}}
      <div class="form-row">
        <label for="password_confirmation">Xác nhận mật khẩu</label>
        {{-- ⚠️ Tên trường phải là "password_confirmation" để rule confirmed hoạt động --}}
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
      </div>

      {{-- CCCD mặt trước --}}
      <div class="form-row">
        <label for="cccd_front">Ảnh CCCD (mặt trước)</label>
        {{-- ⚠️ name="cccd_front" khớp controller --}}
        <input type="file" id="cccd_front" name="cccd_front" accept="image/*,.pdf" required>
        <img id="preview-front" class="preview-img" alt="Xem trước mặt trước CCCD">
        @error('cccd_front')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- CCCD mặt sau --}}
      <div class="form-row">
        <label for="cccd_back">Ảnh CCCD (mặt sau)</label>
        <input type="file" id="cccd_back" name="cccd_back" accept="image/*,.pdf" required>
        <img id="preview-back" class="preview-img" alt="Xem trước mặt sau CCCD">
        @error('cccd_back')
          <small class="error">{{ $message }}</small>
        @enderror
      </div>

      {{-- Nút đăng ký --}}
      <button type="submit" class="submit-btn">ĐĂNG KÝ</button>

      <p>Đã có tài khoản? <a href="{{ route('login.submit') }}">Đăng nhập</a></p>
    </form>
  </main>

  {{-- Footer --}}
  @include('User.Section.footer')

  {{-- CSS + JS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <script src="{{ asset('js/footer.js') }}"></script>
  <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
