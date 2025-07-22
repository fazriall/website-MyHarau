<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PusatBantuan extends Model
{
    protected $fillable = [
        'nama_tempat', 'kategori', 'alamat', 'telepon'
    ];
}
