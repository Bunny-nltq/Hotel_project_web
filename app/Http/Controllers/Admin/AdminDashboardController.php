<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF; // nếu xuất PDF

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'user')->count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();

        $monthlyRevenue = Booking::whereMonth('created_at', Carbon::now()->month)
                                 ->sum('total_price');

        // Dữ liệu biểu đồ doanh thu
        $revenueData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

        // Dữ liệu khách hàng theo loại phòng
        $customerData = Room::select('type', DB::raw('COUNT(*) as total'))
            ->groupBy('type')
            ->pluck('total', 'type');

        return view('admin.dashboard', compact(
            'totalCustomers', 'totalRooms', 'totalBookings', 'monthlyRevenue',
            'revenueData', 'customerData'
        ));
    }

    // Xuất báo cáo PDF
    public function exportReport()
    {
        $bookings = Booking::with('user', 'room')->get();
        $pdf = \PDF::loadView('admin.reports.export', compact('bookings'));
        return $pdf->download('bao_cao_doanh_thu.pdf');
    }
}
