<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập tài khoản</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  {{-- Header --}}
  @include('User.Section.header')

  <!-- Banner -->
  <section class="banner">
    <img src="{{ asset('img/The-Summit-Ariel-Evening-scaled.jpg') }}" alt="Banner" class="banner-img">
    <div class="banner-content">
      <p>Tài khoản</p>
      <h1>Đăng nhập hệ thống</h1>
    </div>
  </section>

  <!-- Form đăng nhập -->
  <main>
    <form class="login-form" method="POST" action="{{ route('login.submit') }}">
      @csrf
      <h2>ĐĂNG NHẬP</h2>

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

      {{-- Ghi nhớ đăng nhập --}}
      <div class="form-row remember-row">
        <label><input type="checkbox" name="remember"> Ghi nhớ đăng nhập</label>
      </div>

      <button type="submit" class="submit-btn">ĐĂNG NHẬP</button>

      <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
    </form>
  </main>

  {{-- Footer --}}
  @include('User.Section.footer')

  {{-- CSS + JS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <script src="{{ asset('js/footer.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
