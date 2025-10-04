// Lấy phần tử
const overlay = document.getElementById("overlay");
const sidebar = document.getElementById("sidebar");
const loginForm = document.getElementById("loginForm");
const bookingForm = document.getElementById("bookingForm");

// Hàm mở sidebar
function openSidebar() {
  sidebar.classList.add("active");
  overlay.classList.add("active");
}

// Hàm mở form đăng nhập
function openLogin() {
  loginForm.classList.add("active");
  overlay.classList.add("active");
}

// Hàm mở form đặt phòng
function openBooking() {
  bookingForm.classList.add("active");
  overlay.classList.add("active");
}

// Hàm đóng tất cả
function closeAll() {
  sidebar.classList.remove("active");
  loginForm.classList.remove("active");
  bookingForm.classList.remove("active");
  overlay.classList.remove("active");
}

// Đóng khi click overlay
overlay.addEventListener("click", closeAll);

// Nếu muốn submenu (dropdown) trong sidebar
document.querySelectorAll(".sidebar a.has-submenu")?.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    link.classList.toggle("open");
    const submenu = link.nextElementSibling;
    if (submenu) submenu.classList.toggle("active");
  });
});
// Đổi màu header khi scroll
const header = document.getElementById("header");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});
