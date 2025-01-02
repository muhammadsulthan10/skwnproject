<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel logs
        $logs = Log::all();

        // Mengirim data ke view
        return view('logs.index', compact('logs'));
    }
}
