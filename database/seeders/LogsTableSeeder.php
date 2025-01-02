<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logs')->insert([
            ['username' => 'admin1', 'action' => 'Created booking', 'description' => 'Booking for Toyota Avanza', 'timestamp' => now()],
            ['username' => 'approver1', 'action' => 'Approved booking', 'description' => 'Approved booking for Mitsubishi L300', 'timestamp' => now()],
            ['username' => 'approver2', 'action' => 'Rejected booking', 'description' => 'Rejected booking for Honda Jazz', 'timestamp' => now()],
            ['username' => 'admin2', 'action' => 'Created booking', 'description' => 'Booking for Suzuki Carry', 'timestamp' => now()],
            ['username' => 'approver3', 'action' => 'Approved booking', 'description' => 'Approved booking for Daihatsu Terios', 'timestamp' => now()],
            ['username' => 'approver4', 'action' => 'Rejected booking', 'description' => 'Rejected booking for Ford Ranger', 'timestamp' => now()],
            ['username' => 'admin3', 'action' => 'Created booking', 'description' => 'Booking for Nissan March', 'timestamp' => now()]
        ]);
    }
}
