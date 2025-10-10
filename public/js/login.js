document.addEventListener("DOMContentLoaded", () => {
    console.log("Login page loaded");

    const form = document.querySelector(".login-form");

    // Kiểm tra rỗng hoặc định dạng email
    form.addEventListener("submit", (e) => {
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        // kiểm tra
        if (!email || !password) {
            e.preventDefault();
            alert("Vui lòng nhập đầy đủ thông tin!");
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            alert("Email không hợp lệ!");
            return;
        }

        
    });
});
