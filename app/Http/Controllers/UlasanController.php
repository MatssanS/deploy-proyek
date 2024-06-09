<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Ulasan; // Import model Rating

class UlasanController extends Controller
{
    public function index()
    {
        $reviews = Ulasan::all(); // Ambil semua ulasan dari database
        return view('ulasan', compact('reviews')); // Kirim data ulasan ke view
    }
}
