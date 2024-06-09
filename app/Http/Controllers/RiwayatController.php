<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;

class RiwayatTransaksiController extends Controller
{
    // Existing methods...

    public function export()
    {
        $transactions = Transaksi::all(); // Retrieve all transactions from the database
        $pdf = PDF::loadView('export.transactions', compact('transactions')); // Load view for PDF export
        return $pdf->download('riwayat_transaksi.pdf'); // Download the PDF file
    }

    public function print()
    {
        $transactions = Transaksi::all(); // Retrieve all transactions from the database
        return view('print.transactions', compact('transactions')); // Load view for printing
    }
}