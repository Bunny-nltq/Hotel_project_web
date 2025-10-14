<div class="container">
    <h1>Báo cáo tổng hợp</h1>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report['title'] }}</td>
                    <td>{{ number_format($report['amount'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>