<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin khách hàng</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/inforUser.css') }}">
</head>
<body>
  <!-- Header -->
  @include('User.Section.header')

  <!-- Banner -->
  <section class="banner">
    <img src="{{ asset('img/The-Summit-Ariel-Evening-scaled.jpg') }}" alt="Banner" class="banner-img">
    <div class="banner-content">
      <p>Thông tin cá nhân của bạn</p>
      <h1>InterContinental Danang Sun Peninsula Resort</h1>
    </div>
  </section>

  <!-- Thông tin khách hàng -->
  <div class="customer-container">
    <h2 class="form-title">Thông tin cá nhân</h2>
    <p class="form-description">Dưới đây là thông tin chi tiết tài khoản của bạn</p>

   <form method="POST" action="{{ route('user.updateInfo') }}" enctype="multipart/form-data">
  @csrf

  <div class="info-grid">
    <div>
      <label>Họ & Tên <span class="required">*</span></label>
      <input type="text" name="fullName" value="{{ $user->fullName }}" required>
    </div>
  </div>

  <div class="info-grid">
    <div>
      <label>Số điện thoại <span class="required">*</span></label>
      <input type="text" name="phone" value="{{ $user->phone }}" required>
    </div>
  </div>

  <div class="info-grid">
    <div>
      <label>Email <span class="required">*</span></label>
      <input type="email" value="{{ $user->email }}" disabled>
    </div>
  </div>

  <!-- Ảnh CCCD -->
  <h3 style="margin-top:2rem;">Ảnh CCCD</h3>
  <div class="cccd-images">
    <img src="{{ asset('storage/' . $user->cccd_front) }}" alt="CCCD Mặt trước">
    <img src="{{ asset('storage/' . $user->cccd_back) }}" alt="CCCD Mặt sau">
  </div>

  <div class="info-grid row-2" style="margin-top:1.5rem;">
    <div>
      <label>Cập nhật CCCD mặt trước</label>
      <input type="file" name="cccd_front" accept="image/*">
    </div>
    <div>
      <label>Cập nhật CCCD mặt sau</label>
      <input type="file" name="cccd_back" accept="image/*">
    </div>
  </div>

  <div class="form-buttons">
    <button type="submit" class="submit-button">Lưu thay đổi</button>
  </div>
</form>

    <!-- Lịch sử đặt phòng -->
    <h3 style="margin-top:2rem;">Lịch sử đặt phòng</h3>
    <table class="history-table">
      <thead>
        <tr>
          <th>Mã đặt phòng</th>
          <th>Ngày nhận</th>
          <th>Ngày trả</th>
          <th>Loại phòng</th>
          <th>Trạng thái</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bookings as $booking)
          <tr>
            <td>{{ $booking->idBooking }}</td>
            <td>{{ $booking->checkin_date }}</td>
            <td>{{ $booking->checkout_date }}</td>
            <td>{{ $booking->room->room_type ?? '—' }}</td>
            <td>{{ ucfirst($booking->status) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="export-buttons">
      <form method="POST" action="{{ route('user.exportPDF') }}">
        @csrf
        <button type="submit" class="export-btn">Xuất PDF</button>
      </form>
    </div>
  </div>

  {{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Footer CSS --}}
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <!-- Footer -->
{{-- Footer --}}
@include('User.Section.footer')

{{-- Footer JS --}}
<script src="{{ asset('js/footer.js') }}"></script>

  {{-- JS --}}
  <script src="{{ asset('js/inforUser.js') }}"></script>
</body>
</html>
