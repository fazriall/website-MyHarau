<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelProduk extends Model
{
    use HasFactory;

    protected $table = 'tb_produk';

    protected $fillable = [
        'id_user',
        'product_name',
        'category',
        'product_price',
        'product_desc',
        'product_img',
        'product_stock',
        'sales',
        'latitude',
        'longitude'
    ];

    // Relasi dengan ModelPayment
    public function payment()
    {
        return $this->hasOne(ModelPayment::class, 'productId', 'id');
    }
    // app/Models/Produk.php
    public function toko()
    {
        return $this->hasOne(Toko::class, 'user_id', 'id_user');
    }
    

}
