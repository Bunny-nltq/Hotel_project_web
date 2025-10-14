<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    // Trang danh sách báo cáo
    public function index()
    {
        // Giả sử sau này bạn có bảng bookings hoặc payments thì có thể thống kê ở đây
        $reports = [
            ['title' => 'Doanh thu tháng 10', 'amount' => 25000000],
            ['title' => 'Tổng số phòng đã đặt', 'amount' => 35],
            ['title' => 'Khách hàng mới', 'amount' => 12],
        ];

        return view('admin.reports.index', compact('reports'));
    }
}
