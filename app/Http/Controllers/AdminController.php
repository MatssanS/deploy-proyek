<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // Check if the admin is already logged in, then redirect to the menu page
        if(Auth::guard('admin')->check()) {
            return redirect()->route('menu');
        }
        return view('login');
    }
    public function login(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('nama', 'password');

    // Attempt to authenticate the admin user
    if (Auth::guard('admin')->attempt($credentials)) {
        // Redirect to the intended page if authentication is successful
        return redirect()->intended('/menu');
    }
    // If authentication fails, redirect back with an error message
    return back()->withErrors([
        'nama' => 'Nama atau password yang diberikan tidak cocok dengan data kami.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
