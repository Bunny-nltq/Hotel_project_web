<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phòng - Đặt phòng</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomBooking.css') }}">
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

    <div class="container">

        {{-- ✅ Hiển thị thông báo sau khi đặt phòng thành công --}}
        @if(session('success'))
            <div class="alert alert-success" style="color:green; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="title">Danh sách phòng</h2>

        <div class="room-list">
            @foreach($rooms as $room)
            <div class="room-card">
                <div class="room-image">
    @if(!empty($room->image))
        <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="Room Image">
    @elseif(!empty($room->images) && count($room->images) > 0)
        <img src="{{ asset('storage/rooms/' . $room->images[0]->image_path) }}" alt="Room Image">
    @else
        <img src="{{ asset('assets/images/room-default.jpg') }}" alt="Room Image">
    @endif
</div>
    

                <div class="room-info">
                    <h3>Phòng số: {{ $room->room_number }}</h3>
                    <p><strong>Loại:</strong> {{ $room->room_type }}</p>
                    <p><strong>Giá:</strong> {{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ / đêm</p>
                    <p><strong>Trạng thái:</strong>
                        <span class="status {{ $room->status }}">
                            {{ $room->status === 'available' ? 'Còn trống' : 'Đã đặt' }}
                        </span>
                    </p>

                    {{-- ✅ Nút đặt phòng chỉ hiện nếu phòng trống --}}
                    @if($room->status === 'available')
                        <button class="btn-book"
                            onclick="openBookingForm('{{ $room->room_number }}', '{{ $room->idRoom }}', '{{ $room->price_per_night }}')">
                            Đặt phòng
                        </button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- ✅ Nếu có danh sách đặt phòng thì hiển thị bên dưới --}}
        @isset($bookings)
            <h2 class="title mt-10">Danh sách đặt phòng của bạn</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Phòng</th>
                        <th>Ngày nhận</th>
                        <th>Ngày trả</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->checkin_date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->checkout_date)->format('d/m/Y') }}</td>
                            <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5">Bạn chưa có đặt phòng nào.</td></tr>
                    @endforelse
                </tbody>
            </table>
        @endisset
    </div>

    <!-- FORM BOOKING SLIDE -->
    <div id="bookingDrawer" class="drawer">
        <div class="drawer-content">
            <span class="close-btn" onclick="closeBookingForm()">&times;</span>

            <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <input type="hidden" name="idRoom" id="hiddenRoomId">

                <label>Phòng:</label>
                <input type="text" id="selectedRoom" readonly required>

                <label>Ngày nhận:</label>
                <input type="date" name="checkin_date" id="checkin_date" required>

                <label>Ngày trả:</label>
                <input type="date" name="checkout_date" id="checkout_date" required>

                <label>Số người:</label>
                <input type="number" name="num_people" min="1" required>

                <label>Ghi chú:</label>
                <textarea name="note"></textarea>

                <label>Giá (VNĐ/đêm):</label>
                <input type="text" id="roomPrice" readonly>

                <label>Tổng tiền (VNĐ):</label>
                <input type="text" id="totalPriceDisplay" readonly>

                <button type="submit" class="btn-submit">Xác nhận đặt</button>
            </form>
        </div>
    </div>

    <script>
        const isGuest = @json(auth()->guest());
    </script>
    <script src="{{ asset('js/roomBooking.js') }}"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Footer --}}
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @include('User.Section.footer')
    <script src="{{ asset('js/footer.js') }}"></script>
</body>
</html>
