<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkomodasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akomodasis')->insert([
            [
                'nama' => 'Hotel Harau Indah',
                'tipe' => 'Hotel',
                'alamat' => 'Jl. Raya Harau No. 10, Harau, Sumbar',
                'telepon' => '0821-1234-5678',
                'deskripsi' => 'Hotel bintang 3 dengan pemandangan lembah Harau yang indah. Menyediakan berbagai fasilitas lengkap.',
            ],
            [
                'nama' => 'Homestay Alam Harau',
                'tipe' => 'Homestay',
                'alamat' => 'Jl. Alam No. 5, Harau, Sumbar',
                'telepon' => '0853-2345-6789',
                'deskripsi' => 'Tempat menginap nyaman dan terjangkau untuk keluarga atau kelompok dengan suasana alami.',
            ],
            [
                'nama' => 'Villa Harau View',
                'tipe' => 'Villa',
                'alamat' => 'Jl. Harau View No. 8, Harau, Sumbar',
                'telepon' => '0877-3456-7890',
                'deskripsi' => 'Villa eksklusif dengan pemandangan lembah Harau, cocok untuk liburan dengan privasi lebih.',
            ]
        ]);
    }
}
