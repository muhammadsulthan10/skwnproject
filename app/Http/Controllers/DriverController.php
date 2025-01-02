<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel drivers
        $drivers = Driver::all();

        // Mengirim data ke view
        return view('drivers.index', compact('drivers'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'driver_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'image_url' => 'required|string|max:255', // Validasi gambar
        ]);

        // Menyimpan data driver ke dalam database
        $driver = Driver::create([
            'driver_name' => $request->driver_name,
            'phone' => $request->phone,
            'license_number' => $request->license_number,
            'image_url' => $request->image_url, // Menyimpan path gambar di database
            'status' => 'available',  // Status default driver
        ]);

        return response()->json([
            'success' => true,
            'driver_id' => $driver->driver_id,
            'driver_name' => $driver->driver_name,
            'phone' => $driver->phone,
            'license_number' => $driver->license_number,
            'image_url' => $driver->image_url, // URL gambar yang dapat diakses
        ]);
    }
}
