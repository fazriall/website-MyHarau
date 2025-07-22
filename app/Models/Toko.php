<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';

    protected $fillable = [
        'user_id',
        'nama_toko',
        'deskripsi',
        'alamat',
        'no_dana',
        'qris',
        'no_telepon',
        'logo_toko',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}