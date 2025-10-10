<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt phòng - Resort Booking</title>

  {{-- Font + Icon --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  {{-- CSS riêng --}}
  <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>
<body>

  <header class="header">
    <div class="logo">🏖️ Resort Booking</div>
    <nav class="nav">
      <a href="{{ route('home') }}">Trang chủ</a>
      <a href="#">Phòng</a>
      <a href="#">Liên hệ</a>
      <a href="{{ route('logout') }}">Đăng xuất</a>
    </nav>
  </header>

  <section class="booking-section">
    <div class="form-container">
      <h2>Đặt phòng ngay</h2>
      <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
        @csrf

        <label for="room">Chọn phòng</label>
        <select name="idRoom" id="room" required>
          <option value="">-- Chọn phòng --</option>
          @foreach($rooms as $room)
            <option value="{{ $room->idRoom }}">{{ $room->name }} - {{ number_format($room->price, 0, ',', '.') }}₫/đêm</option>
          @endforeach
        </select>

        <label for="num_people">Số người</label>
        <input type="number" name="num_people" id="num_people" min="1" max="10" required>

        <label for="checkin_date">Ngày nhận phòng</label>
        <input type="date" name="checkin_date" id="checkin_date" required>

        <label for="checkout_date">Ngày trả phòng</label>
        <input type="date" name="checkout_date" id="checkout_date" required>

        <p id="total_price" class="price-display">Tổng giá: 0₫</p>

        <button type="submit" class="btn-submit">Xác nhận đặt phòng</button>
      </form>
    </div>
  </section>

  <footer class="footer">
    <p>© 2025 Resort Booking. All rights reserved.</p>
  </footer>

  <script src="{{ asset('js/booking.js') }}"></script>
</body>
</html>
