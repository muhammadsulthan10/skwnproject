<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            ['driver_name' => 'John Doe', 'phone' => '081234567890', 'license_number' => '123456789', 'image_url' => 'https://i.pinimg.com/236x/c7/9a/37/c79a37e13ef14be556b51143bcbb1b01.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Jane Smith', 'phone' => '081234567891', 'license_number' => '987654321', 'image_url' => 'https://i.pinimg.com/236x/4b/cc/54/4bcc54ebe6d0e6700e3df3047c1129c8.jpg', 'status' => 'assigned', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Bob Brown', 'phone' => '081234567892', 'license_number' => '112233445', 'image_url' => 'https://i.pinimg.com/736x/7b/c2/c4/7bc2c4b3d9f62414fc651d3e334e27dc.jpg', 'status' => 'off', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Alice Green', 'phone' => '081234567893', 'license_number' => '556677889', 'image_url' => 'https://i.pinimg.com/236x/30/ce/c1/30cec15fd0a36aeb36ba34f4660b1844.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Tom White', 'phone' => '081234567894', 'license_number' => '998877665', 'image_url' => 'https://i.pinimg.com/236x/b8/82/83/b882836fa749f501aefa935d19e19977.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Lucy Black', 'phone' => '081234567895', 'license_number' => '223344556', 'image_url' => 'https://i.pinimg.com/236x/9f/29/bf/9f29bfac8e130837ffe44ff75dc53fff.jpg', 'status' => 'off', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Charlie Gray', 'phone' => '081234567896', 'license_number' => '667788990', 'image_url' => 'https://i.pinimg.com/236x/f6/d5/e8/f6d5e85ea16e0f2f9940ac72520bfc55.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Emma Brown', 'phone' => '081234567897', 'license_number' => '998866554', 'image_url' => 'https://i.pinimg.com/474x/c9/c7/e9/c9c7e928b4f7860cec5489b7db7e9f7e.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'James Blue', 'phone' => '081234567898', 'license_number' => '334455667', 'image_url' => 'https://i.pinimg.com/236x/a7/21/6d/a7216d6c9edff084b1d12255c6fb40c4.jpg', 'status' => 'assigned', 'created_at' => now(), 'updated_at' => now()],
            ['driver_name' => 'Sophia Pink', 'phone' => '081234567899', 'license_number' => '778899112', 'image_url' => 'https://i.pinimg.com/236x/07/d5/ee/07d5ee6e8f259bf01daa4b6d55445576.jpg', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
