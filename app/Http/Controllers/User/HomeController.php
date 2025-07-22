<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua produk dari tabel tb_produk
        $produk = ModelProduk::all();

        // Jika request untuk produk terdekat ada, hitung berdasarkan lokasi pengguna
        if ($request->has('latitude') && $request->has('longitude')) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;

            // Menambahkan perhitungan jarak dengan menggunakan rumus Haversine
            $produk = $produk->map(function ($item) use ($latitude, $longitude) {
                $distance = $this->calculateDistance($latitude, $longitude, $item->latitude, $item->longitude);
                $item->distance = $distance; // Menyimpan jarak ke dalam objek produk
                return $item;
            });

            // Filter produk berdasarkan jarak 10 km
            $produk = $produk->filter(function ($item) {
                return $item->distance <= 10; // Radius 10 km
            });
        }

        // Mengirim data produk ke view
        return view('user.home.home', compact('produk'));
    }

    // Fungsi untuk menghitung jarak menggunakan rumus Haversine
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius bumi dalam km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $R * $c; // Hasil dalam kilometer
    }

    // Fungsi untuk mengubah derajat ke radian
    private function deg2rad($deg)
    {
        return $deg * (pi() / 180);
    }
}
