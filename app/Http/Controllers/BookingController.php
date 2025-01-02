<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel bookings
        $bookings = Booking::all();

        $vehicles = Vehicle::all();

        $drivers = Driver::all();

        $approvers = User::where('role', 'approver')->get();


        // Mengirim data ke view
        return view('bookings.index', compact('bookings', 'vehicles', 'drivers'	, 'approvers'));
    }

    public function store(Request $request)
    {
        // Cek apakah data inputan sesuai
        try {
            // Validasi input
            $validated = $request->validate([
                'vehicle_type' => 'required|string|max:255',
                'vehicle_name' => 'required|string|max:255',
                'driver_name' => 'required|string|max:255',
                'created_by_name' => 'required|string|max:255',
                'approved_by_level1_name' => 'required|string|max:255',
                'approved_by_level2_name' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'purpose' => 'required|string',
            ]);

            // Menyimpan data driver ke dalam database
            $booking = Booking::create([
                'vehicle_name' => $validated['vehicle_name'],
                'driver_name' => $validated['driver_name'],
                'created_by_name' => $validated['created_by_name'],
                'approved_by_level1_name' => $validated['approved_by_level1_name'],
                'approved_by_level2_name' => $validated['approved_by_level2_name'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'purpose' => $validated['purpose'],
                'status' => 'pending', // Status default
                'position1' => $this->getPosition($validated['approved_by_level1_name']),
                'position2' => $this->getPosition($validated['approved_by_level2_name']),
            ]);

            // Mengembalikan respons sukses
            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully!',
                'data' => [
                    'booking_id' => $booking->id,
                    'vehicle_name' => $booking->vehicle_name,
                    'driver_name' => $booking->driver_name,
                    'created_by_name' => $booking->created_by_name,
                    'approved_by_level1_name' => $booking->approved_by_level1_name,
                    'position1' => $booking->position1,
                    'approved_by_level2_name' => $booking->approved_by_level2_name,
                    'position2' => $booking->position2,
                    'status' => $booking->status,
                    'start_date' => $booking->start_date,
                    'end_date' => $booking->end_date,
                    'purpose' => $booking->purpose,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Mengembalikan respons jika validasi gagal
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Mengembalikan respons jika terjadi error lain
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // Function untuk mendapatkan position berdasarkan username
    private function getPosition($username)
    {
        $approver = User::where('username', $username)->first();
        return $approver ? $approver->position : null;
    }

    public function create()
    {
        // Get all unique vehicle types and names
        $vehicles = Vehicle::select('type', 'name')->get();

        // Get all drivers
        $drivers = Driver::select('id', 'name')->get();

        // Get all approvers (users with role 'approver')
        $approvers = User::where('role', 'approver')->select('id', 'name')->get();

        return view('bookings.create', [
            'vehicles' => $vehicles,
            'drivers' => $drivers,
            'approvers' => $approvers,
        ]);
    }
}
