<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel users
        $users = User::all();

        // Mengirim data ke view
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image_url' => 'required|string|url|max:255',
            ]);

            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'position' => $request->position,
                'image_url' => $request->image_url,
            ]);

            return response()->json([
                'success' => true,
                'user_id' => $user->user_id,
                'username' => $user->username,
                'position' => $user->position,
                'image_url' => $user->image_url,
            ]);
        } catch (\Exception $e) {
            Log::error('Error storing user:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

}
