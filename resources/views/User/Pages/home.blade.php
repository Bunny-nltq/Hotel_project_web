<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Khu nghỉ dưỡng</title>

  {{-- Google Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;1,400&display=swap" rel="stylesheet">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>

  {{-- Header --}}
  @include('User.Section.header')

  <!-- Banner -->
  <section class="video-banner">
    <video autoplay muted loop playsinline class="video-bg">
      <source src="{{ asset('img/Untitled video - Made with Clipchamp.mp4') }}" type="video/mp4">
      Trình duyệt của bạn không hỗ trợ video.
    </video>
    <div class="overlay"></div>
    <div class="banner-caption">
      <h1>Khu nghỉ dưỡng biển đẳng cấp</h1>
      <p>Hoang sơ miền nhiệt đới</p>
    </div>
  </section>

  <!-- Section 1 -->
  <div class="section">
    <div style="flex:1 1 50%">
      <img src="{{ asset('img/4-Bedroom-Pool-Villa-Aerial-scaled.jpg') }}" alt="Beach">
    </div>
    <div class="text-box">
      <h2>THIÊN ĐƯỜNG NGHỈ DƯỠNG RIÊNG TƯ</h2>
      <p>Trải nghiệm kỳ nghỉ dưỡng riêng tư miền nhiệt đới nắng vàng, biển xanh và cát trắng tại 
        một trong những khu nghỉ dưỡng biển đẹp nhất Việt Nam.</p>
      <p>Hãy trải nghiệm ẩm thực tinh túy và tận hưởng dịch vụ tận tâm từ đội ngũ nhân viên.</p>
    </div>
  </div>

  <!-- Section 2 -->
  <div class="section">
    <div class="text-box">
      <div class="sub-title">PHÒNG & SUITE</div>
      <h2>PHÒNG & SUITE</h2>
      <p>Nghỉ dưỡng gần gũi với thiên nhiên trong không gian trong lành, tinh khiết và tận hưởng dịch vụ đẳng cấp.</p>
      <a href="#" class="btn">EXPLORE</a>
    </div>
    <div style="flex:1 1 50%">
      <img src="{{ asset('img/2BR-Royal-Residence-master-bedroom-scaled.jpg') }}" alt="Room">
    </div>
  </div>

  <!-- Video section -->
  <div class="video-section">
    <video id="resortVideo" muted playsinline>
      <source src="{{ asset('img/iLoveYt.net_YouTube_Where-Happily-Ever-After-Is-Just-The-Beg_Media_pVQX1CcHE_Y_002_720p.mp4') }}" type="video/mp4">
      Trình duyệt của bạn không hỗ trợ video.
    </video>
  </div>

  <!-- Trải nghiệm -->
  <div style="text-align:center; margin: 60px 0 30px;">
    <h2 style="font-size:28px; letter-spacing:1px; color:#333;">TRẢI NGHIỆM ĐÁNG NHỚ</h2>
    <p style="font-size:16px; color:#666; margin-top:8px;">Ghi Dấu Khoảnh Khắc</p>
  </div>

  <div class="experience-section">
    <div class="experience-card">
      <img src="{{ asset('img/B2SADDJ-scaled-qj77khymi7hx15u5guto69uhbrwt6yzl4shxcvil7k.webp') }}" alt="Digital Design Walking Tour">
      <h3>Digital Design Walking Tour</h3>
      <p>Explore the inspiration behind our architect, Bill Bensley, with this design walking tour.</p>
      <a href="#" class="btn">Read More</a>
    </div>
    <div class="experience-card">
      <img src="{{ asset('img/TENT-FOR-KID-1-scaled-po0vgfdodouc4a2elg6ytev46m7qxhyw09jf1ofvts.webp') }}" alt="A Brief History of Vietnam">
      <h3>A Brief History of Vietnam</h3>
      <p>(According to Bill Bensley)</p>
      <a href="#" class="btn">Read More</a>
    </div>
    <div class="experience-card">
      <img src="{{ asset('img/Wildlife-Workshop-2-pg39z294ts64e9fhh9ljja0jr6ggey6227ajn0vc2o.webp') }}" alt="Trải Nghiệm Cắm Trại">
      <h3>Trải Nghiệm Cắm Trại Trong Phòng Cho Bé</h3>
      <p>Có “vị khách” nhí nào mà không thích cắm trại tại phòng?</p>
      <a href="#" class="btn">Read More</a>
    </div>
  </div>

  <!-- Ưu đãi -->
  <div class="offer-section">
    <div style="text-align:center; margin-bottom: 40px;">
      <h2 style="font-size:28px; letter-spacing:1px; color:#333;">ƯU ĐÃI ĐẶC BIỆT</h2>
    </div>
    <div class="offer-wrapper">
      <div class="offer-card">
        <img src="{{ asset('img/Heavenly-Penthouse-Living-Room-scaled-qa3q57k7n7hjgkj90s7jii3j4qkbcytx8cmlbg85pc.webp') }}" alt="Thiết Kế Độc Bản">
        <h3>Khám Phá Câu Chuyện Thiết Kế Độc Bản</h3>
        <p>Tìm hiểu thêm về sự sáng tạo và trí tưởng tượng phong phú của Kiến trúc sư Bill Bensley qua các tour khám.</p>
        <a href="#" class="btn">Explore</a>
      </div>
      <div class="offer-card">
        <img src="{{ asset('img/DSC00495-scaled.jpg') }}" alt="Book Now">
        <h3>Book Now, Pay Later</h3>
        <p>Mức giá ưu đãi và linh hoạt nhất.</p>
        <a href="#" class="btn">Explore</a>
      </div>
      <div class="offer-card">
        <img src="{{ asset('img/Reception-Hall-1-1.jpg') }}" alt="Mùa Lễ Hội">
        <h3>Trải Nghiệm Mùa Lễ Hội</h3>
        <p>Đón chào Mùa Lễ hội với buffet sáng thượng hạng, thưởng thức hương vị tiệc trà chiều ấm cúng và tái tạo.</p>
        <a href="#" class="btn">Explore</a>
      </div>
    </div>
  </div>

  <!-- Quote -->
  <div class="quote-section">
    <div class="quote-content">
      <p class="quote-text">
        Trải nghiệm kỳ nghỉ dưỡng riêng tư miền nhiệt đới với nắng vàng, biển xanh và cát trắng tại một trong những khu nghỉ dưỡng biển đẹp nhất Việt Nam. Còn gì tuyệt vời hơn khi được đắm mình vào thiên nhiên hoang sơ bên vịnh biển riêng tư và cảm nhận phong cách thiết kế độc đáo.
      </p>
    </div>
    <br>
    <p class="quote-author">SEBASTIAN MODAK <span>- Thời báo New York</span></p>
  </div>

  {{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Footer CSS --}}
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

{{-- Footer --}}
@include('User.Section.footer')

{{-- Footer JS --}}
<script src="{{ asset('js/footer.js') }}"></script>

<script src="{{ asset('js/login.js') }}"></script>

  {{-- JS --}}
  <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
