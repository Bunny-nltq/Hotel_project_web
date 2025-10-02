<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="home.blade.php">
</head>
<style>
     /* Base Styles */
    body {
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      line-height: 1.5;
      color: #333333;
      background-color: #f8f8f8;
    }

    a {
      text-decoration: none;
      color: #ffffff;
      transition: color 0.3s ease;
    }

    .container {
      width: 100%;
      max-width: 1300px;
      margin: 0 auto;
      padding: 15px;
    }

    /* Main Form Container */
    .main-container {
  max-width: fit-content;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.5rem 2rem;
}

.form-container {
  background-color: #fff;
  border-radius: 1rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  width: 100%;
  margin-top: 0.75rem;
  padding: 1.5rem;
  padding-bottom: 1.75rem;
  color: #000;
}

.form-header {
  display: flex;
  flex-direction: column;
  padding-top: 1rem;
}

.form-text {
  width: 100%;
}

.form-title {
  color: #5b141d;
  font-size: 1.875rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  line-height: 1.2;
}

.form-description {
  color: #4b5563;
  font-size: 0.875rem;
  margin-bottom: 1rem;
}
    /* Thông tin liên hệ */
.contact-info {
  margin-bottom: 0.5rem;
  margin-top: 1.5rem;
}

.info-title {
  color: #5b141d;
  font-weight: 600;
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
}

.info-grid {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.fs-field {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.fs-label {
  color: #333333;
  font-size: 0.875rem;
  font-weight: 500;
  line-height: 1.25rem;
  width: 120px;
  text-align: left;
}

.fs-input,
.fs-select {
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
}

.fs-input:focus,
.fs-select:focus,
.input:focus {
  outline: 2px solid #5b141d;
  outline-offset: 2px;
}

#email{
  width: 300px;
}

#address{
  width: 410px;
}

.phone-group {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.phone-input-group {
  display: flex;
  align-items: center;
  gap: 0.25rem;
  width: 100px;
}

.phone-code {
  display: inline-flex;
  align-items: center;
  padding: 0 0.5rem;
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  background-color: #f3f4f6;
  width: 60px;
}

.phone-input {
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
  width: 160px;
  flex: 1;
}

/* Nội dung chi tiết */
.form-field {
  margin-bottom: 1rem;
}

.field-label {
  color: #5b141d;
  font-weight: 600;
  margin-bottom: 0.25rem;
  display: block;
}

.textarea {
  display: block;
  width: 100%;
  border-radius: 0.375rem;
  border: 1px solid #cae3d7;
  margin: 0.25rem 0;
  padding: 0.5rem 0.75rem;
  resize: none;
  font-size: 0.875rem;
}

.textarea:focus {
  outline: 2px solid #5b141d;
  outline-offset: 2px;
}

/* File upload */
.file-input {
  display: block;
}

.file-info {
  color: #6b7280;
  font-size: 0.75rem;
  margin-top: 0.25rem;
}

/* Buttons */
.form-buttons {
  display: flex;
  gap: 1.5rem;
  margin-top: 2rem;
  padding: 0 1rem;
}

.submit-button {
  background-color: #5b141d;
  color: #fff;
  font-weight: 600;
  padding: 0.5rem 1.75rem;
  border-radius: 0.375rem;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  border: none;
  cursor: pointer;
  transition: background-color 0.2s;
}

.submit-button:hover {
  background-color: #5b141d;
}

.cancel-button {
  background-color: #e5e7eb;
  color: #5b141d;
  font-weight: 600;
  padding: 0.5rem 1.75rem;
  border-radius: 0.375rem;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  border: 1px solid #5b141d;
  cursor: pointer;
  transition: background-color 0.2s;
}

.cancel-button:hover {
  background-color: #d1d5db;
}
</style>
<body>
    <div class="menu"></div>

    <section class="main-container">
        <div class="form-container">
            <div class="form-header">
                <div class="form-text">
                    <h2 class="form-title">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    <p class="form-description">
                         Mọi thắc mắc và yêu cầu cần hỗ trợ từ <spam style="color: #5b141d;"><em>CỔ PHỤC VIỆT</em></spam>, vui lòng để lại thông tin tại đây. Chúng tôi sẽ xem xét và gửi phản hồi sớm nhất đến bạn.
                    </p>
                </div>
            </div>
        <!-- Thông tin liên hệ -->
        <div class="contact-info">
            <h3 class="info-title">Thông tin liên hệ</h3>
            <div class="info-grid">
                <div class="fs-field">
                    <label class="fs-label" for="name">Họ và tên: </label>
                    <input class="fs-input" id="name" name="name" placeholder="Họ và tên" required />
                </div>
                <div class="fs-field">
                    <label class="fs-label" for="email">Email: </label>
                    <input class="fs-input" id="email" name="email" placeholder="abc@gmail.com" required />
                </div>
                <div class="fs-field phone-group">
                    <label class="fs-label" for="phone">Số điện thoại: </label>
                    <div class="phone-input-group">
                    <span class="phone-code">+84</span>
                    <input
                        type="tel"
                        id="phone"
                        placeholder="Số điện thoại di động"
                        class="input phone-input"
                    />
                    </div>
                </div>
                <div class="fs-field">
                    <label class="fs-label" for="address">Địa chỉ: </label>
                    <input class="fs-input" id="address" name="address" placeholder="Số nhà, tên đường, xã, phường, huyện, quận, tỉnh, thành phố" required />
                </div>
                <div class="fs-field">
                    <label class="fs-label" for="reason">Lí do liên hệ: </label>
                    <select
                        class="fs-select"
                        id="reason"
                        name="reason"
                        placeholder="Chọn lí do"
                        required
                    >
                        <option value="reason-1">Đặt câu hỏi</option>
                        <option value="reason-2">Chia sẻ lời khen</option>
                        <option value="reason-3">Khiếu nại</option>
                        <option value="reason-4">Yêu cầu công việc</option>
                        <option value="reason-5">Yêu cầu tài trợ/ quyên góp</option>
                        <option value="reason-6">Đề nghị hợp tác</option>
                    </select>
                </div>
            </div>
        </div>
    <!-- Nội dung chi tiết -->
        <div class="form-field">
            <label for="noidung" class="field-label">Nội dung:</label>
            <textarea
                id="noidung"
                rows="4"
                placeholder="Nội dung"
                class="textarea"
            ></textarea>
        </div>
    <!-- File upload -->
        <div class="form-field">
            <input type="file" multiple class="file-input" id="file-upload"/>
            <p class="file-info">
                Mỗi tập tin có dung lượng không quá 4.3MB. Các định dạng phù hợp gồm:
                xps, pdf, doc, docx, rtf, txt, xls, xlsx, csv, bmp, png, jpeg hoặc jpg
            </p>
        </div>
    <!-- Buttons -->
        <div class="form-buttons">
            <button class="submit-button">Submit</button>
            <button class="cancel-button">Hủy</button>
        </div>
  </section>

    <div class="footer"></div>
</body>

<script>
    fetch("menu.html")
    .then(response => response.text())
    .then(data => {
        document.querySelector(".menu").innerHTML = data;
    });
    fetch("footer.html")
    .then(response => response.text())
    .then(data => {
        document.querySelector(".footer").innerHTML = data;
    });
</script>

</html>