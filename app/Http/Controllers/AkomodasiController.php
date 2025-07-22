<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
    public function index()
    {
        $akomodasis = Akomodasi::all();
        return view('akomodasi.index', compact('akomodasis'));
    }
    public function detail($id)
{
    $akomodasi = Akomodasi::findOrFail($id);
    return view('akomodasi.detail', compact('akomodasi'));
}

public function pembayaran(Request $request, $id)
{
    $akomodasi = Akomodasi::findOrFail($id);
    // Simulasikan proses pembayaran
    return view('akomodasi.pembayaran', compact('akomodasi'));
}

}
