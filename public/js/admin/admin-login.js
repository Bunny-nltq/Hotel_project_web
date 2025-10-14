document.addEventListener("DOMContentLoaded", () => {
  console.log("Admin login page loaded");

  const form = document.querySelector(".admin-login-form");

  if (!form) return;

  form.addEventListener("submit", (e) => {
    const email = document.getElementById("admin-email").value.trim();
    const password = document.getElementById("admin-password").value.trim();

    // Kiểm tra nhập liệu
    if (!email || !password) {
      e.preventDefault();
      alert("Vui lòng nhập đầy đủ thông tin đăng nhập quản trị!");
      return;
    }

    // Kiểm tra định dạng email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      e.preventDefault();
      alert("Email quản trị không hợp lệ!");
      return;
    }
  });
});
