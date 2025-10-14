let currentPricePerNight = 0;

// Mở form booking
function openBookingForm(roomNumber, roomId, pricePerNight) {
    if (isGuest) {
        window.location.href = "/login";
        return;
    }

    currentPricePerNight = Number(pricePerNight) || 0;

    document.getElementById('hiddenRoomId').value = roomId;
    document.getElementById('selectedRoom').value = roomNumber;
    const roomPriceInput = document.getElementById('roomPrice');
    const totalDisplay = document.getElementById('totalPriceDisplay');

    if (roomPriceInput) roomPriceInput.value = currentPricePerNight.toLocaleString('vi-VN') + ' VNĐ';
    if (totalDisplay) totalDisplay.value = currentPricePerNight.toLocaleString('vi-VN') + ' VNĐ';

    document.getElementById('bookingDrawer').classList.add('open');
}

// Đóng form booking
function closeBookingForm() {
    document.getElementById('bookingDrawer').classList.remove('open');
}

// Tính tổng tiền khi thay đổi ngày
function calculateTotal() {
    const checkin = document.getElementById('checkin_date').value;
    const checkout = document.getElementById('checkout_date').value;
    const totalDisplay = document.getElementById('totalPriceDisplay');

    if (checkin && checkout) {
        const start = new Date(checkin);
        const end = new Date(checkout);
        let days = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
        days = days > 0 ? days : 1;

        const total = currentPricePerNight * days;
        if (totalDisplay) totalDisplay.value = total.toLocaleString('vi-VN') + ' VNĐ';
    }
}

// DOM ready
document.addEventListener("DOMContentLoaded", function () {
    const checkinEl = document.getElementById('checkin_date');
    const checkoutEl = document.getElementById('checkout_date');

    if (checkinEl) checkinEl.addEventListener('change', calculateTotal);
    if (checkoutEl) checkoutEl.addEventListener('change', calculateTotal);

    const closeBtn = document.querySelector('.drawer .close-btn');
    if (closeBtn) closeBtn.addEventListener('click', closeBookingForm);

    const form = document.getElementById("bookingForm");
    if (form) {
        form.addEventListener("submit", function () {
            // Không preventDefault: form gửi lên server. Backend sẽ tính lại total_price.
            calculateTotal(); // cập nhật hiển thị trước khi submit
        });
    }
});
