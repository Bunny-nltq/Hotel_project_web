<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
</head>
<body>

<main>
  <form class="admin-login-form" action="{{ route('admin.login.post') }}" method="POST">
       @csrf
  <h2>Đăng nhập Quản trị</h2>

    {{-- Lỗi chung (sai email/mật khẩu) --}}
    @if ($errors->has('login_error'))
        <div class="alert alert-danger" style="color:red; text-align:center; margin-bottom:10px;">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <div class="admin-form-row">
      <label for="admin-email">Email quản trị</label>
      <input type="email" id="admin-email" name="email" placeholder="Nhập email admin"
             value="{{ old('email') }}">
      @error('email')
        <span style="color:red;">{{ $message }}</span>
      @enderror
    </div>

    <div class="admin-form-row">
      <label for="admin-password">Mật khẩu</label>
      <input type="password" id="admin-password" name="password" placeholder="Nhập mật khẩu">
      @error('password')
        <span style="color:red;">{{ $message }}</span>
      @enderror
    </div>

    <div class="admin-remember-row">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Ghi nhớ đăng nhập</label>
    </div>

    <button type="submit" class="admin-submit-btn">Đăng nhập</button>

    <p><a href="/admin/forgot-password">Quên mật khẩu?</a></p>
  </form>
</main>

  {{-- CSS + JS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="{{ asset('js/admin/login.js') }}"></script>
</body>
</html>
