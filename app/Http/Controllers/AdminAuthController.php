<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('admin.akomodasi.index');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }
}
