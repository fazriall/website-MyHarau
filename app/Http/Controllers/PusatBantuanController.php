<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PusatBantuan;

class PusatBantuanController extends Controller
{
    public function index()
    {
        $bantuan = PusatBantuan::all();
        return view('pusat-bantuan', compact('bantuan'));
    }
}
