<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            ['vehicle_name' => 'Toyota Avanza', 'vehicle_type' => 'passenger', 'license_plate' => 'B 1234 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-01-10', 'status' => 'available', 'fuel_consumption' => 12.5, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Mitsubishi L300', 'vehicle_type' => 'cargo', 'license_plate' => 'B 5678 XYZ', 'ownership' => 'rented', 'service_schedule' => '2025-02-15', 'status' => 'maintenance', 'fuel_consumption' => 9.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Honda Jazz', 'vehicle_type' => 'passenger', 'license_plate' => 'B 9876 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-01-20', 'status' => 'in_use', 'fuel_consumption' => 15.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Suzuki Carry', 'vehicle_type' => 'cargo', 'license_plate' => 'B 1111 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-03-01', 'status' => 'available', 'fuel_consumption' => 10.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Daihatsu Terios', 'vehicle_type' => 'passenger', 'license_plate' => 'B 2222 XYZ', 'ownership' => 'rented', 'service_schedule' => '2025-03-15', 'status' => 'available', 'fuel_consumption' => 14.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Isuzu Elf', 'vehicle_type' => 'cargo', 'license_plate' => 'B 3333 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-04-01', 'status' => 'in_use', 'fuel_consumption' => 8.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Ford Ranger', 'vehicle_type' => 'cargo', 'license_plate' => 'B 4444 XYZ', 'ownership' => 'rented', 'service_schedule' => '2025-04-15', 'status' => 'maintenance', 'fuel_consumption' => 7.5, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Nissan March', 'vehicle_type' => 'passenger', 'license_plate' => 'B 5555 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-05-01', 'status' => 'available', 'fuel_consumption' => 16.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Toyota Hilux', 'vehicle_type' => 'cargo', 'license_plate' => 'B 6666 XYZ', 'ownership' => 'rented', 'service_schedule' => '2025-05-15', 'status' => 'available', 'fuel_consumption' => 10.5, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Hyundai Tucson', 'vehicle_type' => 'passenger', 'license_plate' => 'B 7777 XYZ', 'ownership' => 'owned', 'service_schedule' => '2025-06-01', 'status' => 'available', 'fuel_consumption' => 12.0, 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'Toyota Avanza', 'vehicle_type' => 'passenger', 'license_plate' => 'B 1234 ABC', 'ownership' => 'owned', 'service_schedule' => '2024-12-15', 'status' => 'available', 'fuel_consumption' => 15.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Honda Jazz', 'vehicle_type' => 'passenger', 'license_plate' => 'B 4567 DEF', 'ownership' => 'rented', 'service_schedule' => '2024-11-20', 'status' => 'available', 'fuel_consumption' => 14.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Mitsubishi Triton', 'vehicle_type' => 'cargo', 'license_plate' => 'B 7890 GHI', 'ownership' => 'owned', 'service_schedule' => '2024-12-25', 'status' => 'available', 'fuel_consumption' => 8.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Suzuki Ertiga', 'vehicle_type' => 'passenger', 'license_plate' => 'B 2345 JKL', 'ownership' => 'rented', 'service_schedule' => '2024-11-18', 'status' => 'available', 'fuel_consumption' => 16.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Daihatsu Xenia', 'vehicle_type' => 'passenger', 'license_plate' => 'B 5678 MNO', 'ownership' => 'owned', 'service_schedule' => '2024-12-10', 'status' => 'available', 'fuel_consumption' => 15.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Isuzu Elf', 'vehicle_type' => 'cargo', 'license_plate' => 'B 8901 PQR', 'ownership' => 'rented', 'service_schedule' => '2024-12-05', 'status' => 'available', 'fuel_consumption' => 7.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Toyota Innova', 'vehicle_type' => 'passenger', 'license_plate' => 'B 3456 STU', 'ownership' => 'owned', 'service_schedule' => '2024-12-20', 'status' => 'available', 'fuel_consumption' => 14.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Honda Brio', 'vehicle_type' => 'passenger', 'license_plate' => 'B 6789 VWX', 'ownership' => 'rented', 'service_schedule' => '2024-11-25', 'status' => 'available', 'fuel_consumption' => 16.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Nissan Grand Livina', 'vehicle_type' => 'cargo', 'license_plate' => 'B 9012 YZ ', 'ownership' => 'owned', 'service_schedule' => '2024-12-12',  'status' => 'available', 'fuel_consumption' => 15.20, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Suzuki Carry', 'vehicle_type' => 'cargo', 'license_plate' => 'B 1234 BCD', 'ownership' => 'rented', 'service_schedule' => '2024-12-03', 'status' => 'available', 'fuel_consumption' => 8.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Toyota Fortuner', 'vehicle_type' => 'passenger', 'license_plate' => 'B 4567 EFG', 'ownership' => 'owned', 'service_schedule' => '2024-12-18', 'status' => 'available', 'fuel_consumption' => 12.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Honda CR-V', 'vehicle_type' => 'passenger', 'license_plate' => 'B 7890 HIJ', 'ownership' => 'rented', 'service_schedule' => '2024-11-23', 'status' => 'available', 'fuel_consumption' => 13.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Mitsubishi Pajero Sport', 'vehicle_type' => 'passenger', 'license_plate' => 'B 2345 KLM', 'ownership' => 'owned', 'service_schedule' => '2024-12-08', 'status' => 'available', 'fuel_consumption' => 11.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Daihatsu Ayla', 'vehicle_type' => 'passenger', 'license_plate' => 'B 5678 NOP', 'ownership' => 'rented', 'service_schedule' => '2024-11-28', 'status' => 'available', 'fuel_consumption' => 17.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Isuzu Giga', 'vehicle_type' => 'cargo', 'license_plate' => 'B 8901 QRS', 'ownership' => 'owned', 'service_schedule' => '2024-12-01', 'status' => 'available', 'fuel_consumption' => 6.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Toyota Camry', 'vehicle_type' => 'passenger', 'license_plate' => 'B 3456 TUV', 'ownership' => 'rented', 'service_schedule' => '2024-12-04', 'status' => 'available', 'fuel_consumption' => 12.50, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Honda Civic', 'vehicle_type' => 'passenger', 'license_plate' => 'B 6789 WXY', 'ownership' => 'owned', 'service_schedule' => '2024-12-17', 'status' => 'available', 'fuel_consumption' => 13.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Nissan X-Trail', 'vehicle_type' => 'passenger', 'license_plate' => 'B 9012 ZAB', 'ownership' => 'rented', 'service_schedule' => '2024-11-30', 'status' => 'available', 'fuel_consumption' => 11.00, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Suzuki APV', 'vehicle_type' => 'passenger', 'license_plate' => 'B 1234 CDE', 'ownership' => 'owned', 'service_schedule' => '2024-12-13', 'status' => 'available', 'fuel_consumption' => 14.80, 'created_at' => now(), 'updated_at' =>now()],
            ['vehicle_name' => 'Daihatsu Terios', 'vehicle_type' => 'passenger', 'license_plate' => 'B 4567 FGH', 'ownership' => 'rented', 'service_schedule' => '2024-12-02', 'status' => 'available', 'fuel_consumption' => 12.80, 'created_at' => now(), 'updated_at' =>now()],
        ]);
    }
}
