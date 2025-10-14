// ===== LẤY PHẦN TỬ =====
const overlay = document.getElementById("overlay");
const sidebar = document.getElementById("sidebar");

// ===== MỞ SIDEBAR =====
function openSidebar() {
  sidebar.classList.add("active");
  overlay.classList.add("active");
}

// ===== ĐÓNG TẤT CẢ =====
function closeAll() {
  sidebar.classList.remove("active");
  overlay.classList.remove("active");
}

// ===== ĐÓNG KHI CLICK OVERLAY =====
overlay.addEventListener("click", closeAll);

// ===== HIỆU ỨNG HEADER KHI CUỘN =====
const header = document.getElementById("header");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});
