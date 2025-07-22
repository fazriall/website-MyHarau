<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelPayment;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function create()
    {
        return view('seller.tambahProduk.tambahProduk');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:1',
            'product_desc' => 'required|string',
            'latitude' => 'required|numeric', // validate latitude
            'longitude' => 'required|numeric', // validate longitude
            'sales' => 'nullable'
        ]);

        try {
            // Upload image
            if ($request->hasFile('product_img')) {
                $file = $request->file('product_img');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/produk'), $fileName);
                
                // Save product data to database
                ModelProduk::create([
                    'id_user' => Auth::id(),                // Seller ID (logged-in user)
                    'product_name' => $request->product_name, // Product name
                    'category' => $request->category,        // Category
                    'product_price' => intval(str_replace('.', '', $request->product_price)), // Product price
                    'product_desc' => $request->product_desc, // Product description
                    'product_img' => $fileName,              // Image path
                    'product_stock' => $request->product_stock, // Stock
                    'latitude' => $request->latitude,       // Latitude
                    'longitude' => $request->longitude,     // Longitude
                ]);

                // Redirect with success message
                return redirect()->route('seller.daftarProduk')->with('success', 'Produk berhasil ditambahkan!');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('seller.tambahProduk')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function buyAgain($orderId)
    {
        $payment = ModelPayment::where('user_id', Auth::id())->where('id', $orderId)->first();
        if ($payment) {
            // Redirect user to the shopping cart with selected products
            return redirect()->route('user.cart.add', ['products' => $payment->keranjang->pluck('product_id')]);
        }

        return redirect()->route('user.pesanan')->with('error', 'Pesanan tidak ditemukan.');
    }
}
