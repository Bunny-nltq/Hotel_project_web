function loadCharts(revenueData, customerData) {
  const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
  const ctxCustomer = document.getElementById('customerChart').getContext('2d');

  new Chart(ctxRevenue, {
    type: 'bar',
    data: {
      labels: Object.keys(revenueData).map(m => 'Tháng ' + m),
      datasets: [{
        label: 'Doanh thu (₫)',
        data: Object.values(revenueData),
        borderWidth: 1,
        backgroundColor: 'rgba(75, 192, 192, 0.6)'
      }]
    }
  });

  new Chart(ctxCustomer, {
    type: 'pie',
    data: {
      labels: Object.keys(customerData),
      datasets: [{
        label: 'Khách hàng theo loại phòng',
        data: Object.values(customerData),
        backgroundColor: [
          '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0'
        ]
      }]
    }
  });
}
