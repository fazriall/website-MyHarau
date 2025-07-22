<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PusatBantuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pusat_bantuans')->insert([
            [
                'nama_tempat' => 'Klinik Harau Sehat',
                'kategori' => 'Kesehatan',
                'alamat' => 'Jl. Lintas Harau No. 10',
                'telepon' => '082112345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tempat' => 'Bengkel Motor Amanah',
                'kategori' => 'Bengkel',
                'alamat' => 'Jl. Harau Timur No. 7',
                'telepon' => '082298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tempat' => 'Pos Polisi Harau',
                'kategori' => 'Keamanan',
                'alamat' => 'Jl. Raya Harau',
                'telepon' => '075123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
