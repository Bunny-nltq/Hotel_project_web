// ===== LẤY PHẦN TỬ =====
const overlay = document.getElementById("overlay");
const sidebar = document.getElementById("sidebar");
const bookingForm = document.getElementById("bookingForm");

// ===== MỞ SIDEBAR =====
function openSidebar() {
  sidebar.classList.add("active");
  overlay.classList.add("active");
}

// ===== MỞ FORM ĐẶT PHÒNG =====
function openBooking() {
  bookingForm.classList.add("active");
  overlay.classList.add("active");
}

// ===== ĐÓNG TẤT CẢ (SIDEBAR + FORM + OVERLAY) =====
function closeAll() {
  sidebar.classList.remove("active");
  overlay.classList.remove("active");
  if (bookingForm) bookingForm.classList.remove("active");
}

// ===== ĐÓNG KHI CLICK OVERLAY =====
overlay.addEventListener("click", closeAll);

// ===== XỬ LÝ MENU CON (NẾU CÓ) =====
document.querySelectorAll(".sidebar a.has-submenu")?.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    link.classList.toggle("open");
    const submenu = link.nextElementSibling;
    if (submenu) submenu.classList.toggle("active");
  });
});

// ===== ĐỔI MÀU HEADER KHI CUỘN TRANG =====
const header = document.getElementById("header");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});
