<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKeranjang;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index(Request $request)
    {
        $user = Auth::user();
        $directCheckout = $request->session()->get('directCheckout');
        $cart = [];
    
        if ($directCheckout) {
            $cart[] = [
                'jumlah' => $directCheckout['jumlah'],
                'produk' => ModelProduk::find($directCheckout['product_id']),
            ];
            $request->session()->forget('directCheckout');
        } else {
            $cart = ModelKeranjang::with('produk')->where('user_id', $user->id)->get();
        }
    
        // Lokasi pengguna (misalnya latitude dan longitude disimpan di database user)
        $userLat = $user->latitude;
        $userLng = $user->longitude;
    
        $shippingFee = 0;
        $updatedCart = [];
    
        foreach ($cart as $item) {
            $produk = $item['produk'];
    
            // Koordinat produk
            $productLat = $produk->latitude;
            $productLng = $produk->longitude;
    
            // Hitung jarak menggunakan Haversine
            $earthRadius = 6371; // kilometer
            $latFrom = deg2rad($userLat);
            $lngFrom = deg2rad($userLng);
            $latTo = deg2rad($productLat);
            $lngTo = deg2rad($productLng);
    
            $latDelta = $latTo - $latFrom;
            $lngDelta = $lngTo - $lngFrom;
    
            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lngDelta / 2), 2)));
            $distance = round($earthRadius * $angle, 2); // dalam km, dibulatkan 2 angka
    
            // Biaya kirim berdasarkan jarak dalam radius 10km
            $itemShippingFee = 0;
            if ($distance <= 10) {
                $itemShippingFee = 750* $distance; // contoh: Rp 3.000/km
            }
    
            $shippingFee += $itemShippingFee;
    
            $updatedCart[] = [
                'jumlah' => $item['jumlah'],
                'produk' => $produk,
                'jarak' => $distance,
                'ongkir_produk' => $itemShippingFee,
            ];
        }
    

        
        // Hitung total harga produk
        $totalPrice = collect($updatedCart)->sum(function ($item) {
            return $item['jumlah'] * $item['produk']->product_price;
        });
    
        $adminFee = 2000;
        $finalTotal = $totalPrice + $shippingFee + $adminFee;
    
        $request->session()->put('finalTotal', $finalTotal);
        $request->session()->put('totalPrice', $totalPrice);
        $request->session()->put('shippingFee', $shippingFee);
        $request->session()->put('adminFee', $adminFee);
        $request->session()->put('finalTotal', $finalTotal);
        $address = $user->address;
    
        return view('user.checkout.checkout', compact('updatedCart', 'totalPrice', 'shippingFee', 'adminFee', 'finalTotal', 'address'))->with('cart', $updatedCart);
    }

    public function directCheckout(Request $request) {
        $request->validate([
            'product_id' => 'required|',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $product = ModelProduk::find($request->product_id);
    
        if ($product->product_stock < $request->quantity) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }
    
        // Simpan data sementara ke session
        $request->session()->put('directCheckout', [
            'product_id' => $request->product_id,
            'jumlah' => $request->quantity,
            
        ]);

        
    
        return redirect()->route('checkout'); // ← Redirect ke halaman checkout
    }
    
}
