<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            ['vehicle_name' => 'Toyota Avanza', 'driver_name' => 'John Doe', 'created_by_name' => 'Siska', 'approved_by_level1_name' => 'approver1', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver2', 'position2' => 'Finance Manager', 'status' => 'approved', 'start_date' => '2025-01-05', 'end_date' => '2025-01-06', 'purpose' => 'Meeting with client', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Mitsubishi L300', 'driver_name' => 'Jane Smith', 'created_by_name' => 'Siska', 'approved_by_level1_name' => 'approver1', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver2', 'position2' => 'HR Manager', 'status' => 'pending', 'start_date' => '2025-01-07', 'end_date' => '2025-01-08', 'purpose' => 'Office supplies delivery', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Honda Jazz', 'driver_name' => 'Bob Brown', 'created_by_name' => 'Siska', 'approved_by_level1_name' => 'approver1', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver2', 'position2' => 'IT Manager', 'status' => 'rejected', 'start_date' => '2025-01-09', 'end_date' => '2025-01-10', 'purpose' => 'Team outing', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Suzuki Carry', 'driver_name' => 'Alice Green', 'created_by_name' => 'Andrea', 'approved_by_level1_name' => 'approver3', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver4', 'position2' => 'Marketing Manager', 'status' => 'approved', 'start_date' => '2025-01-11', 'end_date' => '2025-01-12', 'purpose' => 'Event logistics', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Daihatsu Terios', 'driver_name' => 'Tom White', 'created_by_name' => 'Natalie', 'approved_by_level1_name' => 'approver5', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver6', 'position2' => 'Legal Manager', 'status' => 'pending', 'start_date' => '2025-01-13', 'end_date' => '2025-01-14', 'purpose' => 'Employee transportation', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Isuzu Elf', 'driver_name' => 'Lucy Black', 'created_by_name' => 'Reyna', 'approved_by_level1_name' => 'approver1', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver2', 'position2' => 'Compliance Manager', 'status' => 'approved', 'start_date' => '2025-01-15', 'end_date' => '2025-01-16', 'purpose' => 'Supply delivery', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Ford Ranger', 'driver_name' => 'Charlie Gray', 'created_by_name' => 'Siska', 'approved_by_level1_name' => 'approver3', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver4', 'position2' => 'Marketing Manager', 'status' => 'rejected', 'start_date' => '2025-01-17', 'end_date' => '2025-01-18', 'purpose' => 'Marketing trip', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Nissan March', 'driver_name' => 'Emma Brown', 'created_by_name' => 'Andrea', 'approved_by_level1_name' => 'approver5', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver6', 'position2' => 'Legal Manager', 'status' => 'pending', 'start_date' => '2025-01-19', 'end_date' => '2025-01-20', 'purpose' => 'Document delivery', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Toyota Hilux', 'driver_name' => 'James Blue', 'created_by_name' => 'Natalie', 'approved_by_level1_name' => 'approver1', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver2', 'position2' => 'Finance Manager', 'status' => 'approved', 'start_date' => '2025-01-21', 'end_date' => '2025-01-22', 'purpose' => 'Financial audit', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Hyundai Tucson', 'driver_name' => 'Sophia Pink', 'created_by_name' => 'Reyna', 'approved_by_level1_name' => 'approver3', 'position1' => 'Finance Manager', 'approved_by_level2_name' => 'approver4', 'position2' => 'Marketing Manager', 'status' => 'approved', 'start_date' => '2025-01-23', 'end_date' => '2025-01-24', 'purpose' => 'Client meeting', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
