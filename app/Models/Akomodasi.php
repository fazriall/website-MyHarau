<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akomodasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'tipe', 'deskripsi', 'foto', 'alamat', 'telepon',
        'jenis_penginapan', 'jenis_kendaraan', 'kapasitas',
        'fasilitas', 'harga'
    ];
}
