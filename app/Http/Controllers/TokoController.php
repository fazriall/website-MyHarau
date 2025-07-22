<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        // Get currently logged in user
        $user = Auth::user();
        
        // Get the toko data associated with this user
        $toko = Toko::where('user_id', $user->id)->first();
        
        return view('edit-toko', compact('toko'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'logo_toko' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $toko = Toko::where('user_id', $user->id)->first();

        // If toko doesn't exist for this user, create one
        if (!$toko) {
            $toko = new Toko();
            $toko->user_id = $user->id;
        }

        // Update toko details
        $toko->nama_toko = $request->nama_toko;
        $toko->deskripsi = $request->deskripsi;
        $toko->alamat = $request->alamat;
        $toko->no_telepon = $request->no_telepon;

        // Handle logo upload if provided
        if ($request->hasFile('logo_toko')) {
            // Hapus logo lama jika ada
            if ($toko->logo_toko && file_exists(public_path('storage/' . $toko->logo_toko))) {
                unlink(public_path('storage/' . $toko->logo_toko));
            }
        
            // Upload logo baru
            $file = $request->file('logo_toko');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/logos'), $fileName);
        
            // Simpan path relatif ke database
            $toko->logo_toko = 'logos/' . $fileName;

        // Handle QRIS upload jika ada
        if ($request->hasFile('qris')) {
            // Hapus QRIS lama jika ada
            if ($toko->qris && file_exists(public_path('storage/' . $toko->qris))) {
                unlink(public_path('storage/' . $toko->qris));
            }
        
            // Upload QRIS baru
            $file = $request->file('qris');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/qris'), $fileName);
        
            // Simpan path relatif ke database
            $toko->qris = 'qris/' . $fileName;
        }
        }

        $toko->save();

        return redirect()->route('edit.toko')->with('success', 'Informasi toko berhasil diperbarui!');
    }
}