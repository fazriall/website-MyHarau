<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akomodasi;
use Illuminate\Http\Request;

class AdminAkomodasiController extends Controller
{
    public function index()
    {
        $akomodasis = Akomodasi::all();
        return view('admin.akomodasi.index', compact('akomodasis'));
    }

    public function create()
    {
        return view('admin.akomodasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'jenis_penginapan' => 'nullable|string',
            'jenis_kendaraan' => 'nullable|string',
            'kapasitas' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'harga' => 'nullable|numeric',
        ]);

        $akomodasi = new Akomodasi($request->except('foto'));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/akomodasi'), $fileName);
            $akomodasi->foto = 'akomodasi/' . $fileName;
        }

        $akomodasi->save();

        return redirect()->route('admin.akomodasi.index')->with('success', 'Data akomodasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $akomodasi = Akomodasi::findOrFail($id);
        return view('admin.akomodasi.edit', compact('akomodasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'jenis_penginapan' => 'nullable|string',
            'jenis_kendaraan' => 'nullable|string',
            'kapasitas' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'harga' => 'nullable|numeric',
        ]);

        $akomodasi = Akomodasi::findOrFail($id);
        $akomodasi->fill($request->except('foto'));

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($akomodasi->foto && file_exists(public_path('storage/' . $akomodasi->foto))) {
                unlink(public_path('storage/' . $akomodasi->foto));
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/akomodasi'), $fileName);
            $akomodasi->foto = 'akomodasi/' . $fileName;
        }

        $akomodasi->save();

        return redirect()->route('admin.akomodasi.index')->with('success', 'Data akomodasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $akomodasi = Akomodasi::findOrFail($id);

        if ($akomodasi->foto && file_exists(public_path('storage/' . $akomodasi->foto))) {
            unlink(public_path('storage/' . $akomodasi->foto));
        }

        $akomodasi->delete();

        return redirect()->route('admin.akomodasi.index')->with('success', 'Data akomodasi berhasil dihapus.');
    }
}
