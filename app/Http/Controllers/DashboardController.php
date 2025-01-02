<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __construct(){

        // Hanya user yang terautentikasi yang bisa mengakses controller ini
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Data statis untuk dashboard
        $bookings = Booking::all();

        // Mengambil data statistik kendaraan
        $cargoCount = Vehicle::where('vehicle_type', 'cargo')
            ->where('status', 'available')
            ->count();

        $passengerCount = Vehicle::where('vehicle_type', 'passenger')
            ->where('status', 'available')
            ->count();

        $driverCount = Driver::where('status', 'available')->count();

        // Kirim data ke view
        return view('dashboards.index', compact(
            'cargoCount',
            'passengerCount',
            'driverCount',
            'bookings',
        ));
    }

    public function getBookingData(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Ambil semua kolom dari tabel booking berdasarkan rentang tanggal
        $bookings = Booking::all();

        return response()->json($bookings);
    }

    public function getBookingsChartData(Request $request)
    {
        $startDate = $request->query('start_date', now()->subMonth()->toDateString());
        $endDate = $request->query('end_date', now()->toDateString());


        $data = DB::table('bookings')
            ->select(DB::raw('DATE(start_date) as date'), DB::raw('COUNT(*) as total'))
            ->where('status', 'approved')
            ->whereBetween('start_date', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($data);
    }
}
