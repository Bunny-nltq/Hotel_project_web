export default function initHeader() {
  // Header scroll effect
  window.addEventListener("scroll", () => {
    const header = document.getElementById("header");
    if (header) header.classList.toggle("scrolled", window.scrollY > 50);
  });

  // Open/Close functions
  window.openSidebar = function () {
    document.getElementById("sidebar").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  window.openBooking = function () {
    document.getElementById("bookingForm").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  window.openLogin = function () {
    document.getElementById("loginForm").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  window.closeAll = function () {
    document.querySelectorAll(".sidebar,.booking-form,.login-form")
      .forEach(el => el.classList.remove("active"));
    document.getElementById("overlay").classList.remove("active");
  }

  // ESC key close
  document.addEventListener("keydown", e => {
    if (e.key === "Escape") closeAll();
  });

  // Click overlay close
  const overlay = document.getElementById("overlay");
  if (overlay) overlay.addEventListener("click", closeAll);
}

document.addEventListener("DOMContentLoaded", initHeader);
