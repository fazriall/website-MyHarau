<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function show($id)
    {
        $produk = ModelProduk::with('toko')->find($id);
    
        if (!$produk) {
            abort(404, 'Produk tidak ditemukan');
        }
    
        return view('user.detailProduk.detailProduk', compact('produk'));
    }
    
}
