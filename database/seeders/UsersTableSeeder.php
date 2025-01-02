<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['username' => 'Siska', 'password' => bcrypt('password1'), 'role' => 'admin', 'position' => 'Admin', 'image_url' => 'https://i.pinimg.com/236x/2a/7d/4c/2a7d4c4bc1381a476b8b8a85885ac392.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Margaret', 'password' => bcrypt('password2'), 'role' => 'approver', 'position' => 'Finance Manager', 'image_url' => 'https://i.pinimg.com/236x/00/62/87/006287d3aa9c240f2ca4fdfe90d67a39.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Naufal', 'password' => bcrypt('password3'), 'role' => 'approver', 'position' => 'HR Manager', 'image_url' => 'https://i.pinimg.com/474x/55/ac/fa/55acfa16eed2106be6361aaf72fb3e44.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Andrea', 'password' => bcrypt('password4'), 'role' => 'admin', 'position' => 'Admin', 'image_url' => 'https://i.pinimg.com/474x/f8/07/d5/f807d52339a484e7ea6c88f9097d93fa.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'John', 'password' => bcrypt('password5'), 'role' => 'approver', 'position' => 'Marketing Manager', 'image_url' => 'https://i.pinimg.com/236x/ff/f9/dd/fff9dd0b5457079bd034a599cf0e5021.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Bratt', 'password' => bcrypt('password6'), 'role' => 'approver', 'position' => 'Procurement Manager', 'image_url' => 'https://i.pinimg.com/236x/ea/4f/cc/ea4fcc1e369d191c592a1f30b7e1ae88.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Natalie', 'password' => bcrypt('password7'), 'role' => 'admin', 'position' => 'Admin', 'image_url' => 'https://i.pinimg.com/474x/59/27/3d/59273d3e6ccddd906b58414f746b858a.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Hasta', 'password' => bcrypt('password8'), 'role' => 'approver', 'position' => 'Legal Manager', 'image_url' => 'https://i.pinimg.com/474x/7d/d7/a1/7dd7a160755090f6e7a441e734bca87f.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Reyna', 'password' => bcrypt('password9'), 'role' => 'admin', 'position' => 'Admin', 'image_url' => 'https://i.pinimg.com/474x/12/2d/bf/122dbfb3fe50be6874ad9428ca70489c.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Mark', 'password' => bcrypt('password10'), 'role' => 'approver', 'position' => 'Compliance Manager', 'image_url' => 'https://i.pinimg.com/236x/47/91/f0/4791f027dcad85f85883359daf191c5d.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
