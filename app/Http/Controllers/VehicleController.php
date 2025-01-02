<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel vehicles
        $vehicles = Vehicle::all();

        // Mengirim data ke view
        return view('vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
            'ownership' => 'required|string|max:255',
            'fuel_consumption' => 'required|numeric',
        ]);

        // Simpan data kendaraan
        $vehicle = Vehicle::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'license_plate' => $request->license_plate,
            'ownership' => $request->ownership,
            'fuel_consumption' => $request->fuel_consumption,
            'service_schedule' => now()->addMonth(),
            'status' => 'available',
        ]);


        // Mengembalikan response JSON yang benar
        return response()->json([
            'success' => true,
            'vehicle_id' => $vehicle->vehicle_id, // vehicle_id adalah id auto-increment
            'vehicle_name' => $vehicle->vehicle_name,
            'vehicle_type' => $vehicle->vehicle_type,
            'license_plate' => $vehicle->license_plate,
            'ownership' => $vehicle->ownership,
            'fuel_consumption' => $vehicle->fuel_consumption,
            'service_schedule' => $vehicle->service_schedule->format('Y-m-d'),
        ]);
    }

}
