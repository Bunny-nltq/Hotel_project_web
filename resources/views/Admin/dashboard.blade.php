<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
  
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Bảng điều khiển Quản trị</h2>

  {{-- Các thẻ thống kê --}}
  <div class="row text-center mb-4">
    <div class="col-md-3">
      <div class="card p-3 shadow-sm">
        <h5>Tổng khách hàng</h5>
        <h3>{{ $totalCustomers }}</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 shadow-sm">
        <h5>Tổng phòng</h5>
        <h3>{{ $totalRooms }}</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 shadow-sm">
        <h5>Tổng booking</h5>
        <h3>{{ $totalBookings }}</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 shadow-sm">
        <h5>Doanh thu tháng này</h5>
        <h3>{{ number_format($monthlyRevenue, 0, ',', '.') }}₫</h3>
      </div>
    </div>
  </div>

  {{-- Biểu đồ --}}
  <div class="row">
    <div class="col-md-6">
      <canvas id="revenueChart"></canvas>
    </div>
    <div class="col-md-6">
      <canvas id="customerChart"></canvas>
    </div>
  </div>

  {{-- Nút xuất báo cáo --}}
  <div class="text-center mt-5">
    <a href="{{ route('admin.report.export') }}" class="btn btn-success">
      <i class="fa fa-file-export"></i> Xuất Báo Cáo
    </a>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
<script>
  loadCharts(@json($revenueData), @json($customerData));
</script>
@endsection  

</body>
</html>