document.addEventListener("DOMContentLoaded", () => {
  const roomSelect = document.getElementById("room");
  const checkin = document.getElementById("checkin_date");
  const checkout = document.getElementById("checkout_date");
  const totalPrice = document.getElementById("total_price");

  // Lưu dữ liệu giá phòng từ option
  const roomPrices = {};
  document.querySelectorAll("#room option").forEach(opt => {
    if (opt.textContent.includes("₫")) {
      const price = opt.textContent.match(/([\d\.]+)₫/);
      if (price) roomPrices[opt.value] = parseInt(price[1].replace(/\./g, ""));
    }
  });

  function calcPrice() {
    const idRoom = roomSelect.value;
    if (!idRoom || !checkin.value || !checkout.value) {
      totalPrice.textContent = "Tổng giá: 0₫";
      return;
    }
    const pricePerNight = roomPrices[idRoom];
    const start = new Date(checkin.value);
    const end = new Date(checkout.value);
    const nights = (end - start) / (1000 * 60 * 60 * 24);
    if (nights <= 0) {
      totalPrice.textContent = "Ngày không hợp lệ!";
      return;
    }
    const total = pricePerNight * nights;
    totalPrice.textContent = `Tổng giá: ${total.toLocaleString()}₫ (${nights} đêm)`;
  }

  roomSelect.addEventListener("change", calcPrice);
  checkin.addEventListener("change", calcPrice);
  checkout.addEventListener("change", calcPrice);
});
