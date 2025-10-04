document.addEventListener("DOMContentLoaded", () => {
    console.log("Register page loaded");

    const form = document.querySelector(".register-form");

    // Kiểm tra mật khẩu
    form.addEventListener("submit", (e) => {
        const password = document.getElementById("password").value;
        const confirm = document.getElementById("confirm-password").value;

        if (password !== confirm) {
            e.preventDefault();
            alert("Mật khẩu xác nhận không khớp!");
        } else {
            e.preventDefault(); // Chặn submit thật (demo)
            alert("🎉 Đăng ký thành công!");
            setTimeout(() => {
                window.location.href = "/"; // Chuyển về trang home
            }, 2000);
        }
    });

    // Xem trước ảnh CCCD
    const previewImage = (input, previewId) => {
        const file = input.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    };

    document.getElementById("cccd-front").addEventListener("change", function () {
        previewImage(this, "preview-front");
    });

    document.getElementById("cccd-back").addEventListener("change", function () {
        previewImage(this, "preview-back");
    });
});
