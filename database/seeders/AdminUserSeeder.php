<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Harau',
            'email' => 'admin@harau.test',
            'password' => Hash::make('password123'), // Ganti dengan password aman
            'phone_number' => '081234567890',
            'profile_picture' => null,
            'role_id' => 3, // role_id 3 = admin
            'address' => 'Harau, Sumatera Barat',
            'about' => 'Admin untuk mengelola konten Harau',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
