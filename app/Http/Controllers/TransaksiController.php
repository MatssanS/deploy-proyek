<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options; // Import the PDF facade

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all transactions ordered by date
        $transactions = Transaksi::orderBy('tanggal_transaksi', 'asc')->get();
    
        // Define an empty array for months
        $months = [];
    
        // If a specific month is provided in the request, filter transactions by that month
        if ($request->has('month')) {
            $transactions = $transactions->filter(function ($transaction) use ($request, &$months) {
                // Extract month and year from the transaction date
                $monthYear = date('Y-m', strtotime($transaction->tanggal_transaksi));
                // Add the month to the $months array if it doesn't already exist
                if (!in_array($monthYear, $months)) {
                    $months[] = $monthYear;
                }
                // Return transactions matching the requested month
                return $monthYear == $request->month;
            });
        } else {
            // If no specific month is requested, populate the $months array with all unique months from transactions
            $months = $transactions->map(function ($transaction) {
                return date('Y-m', strtotime($transaction->tanggal_transaksi));
            })->unique()->values()->toArray();
        }
    
        // Pass $months to the view along with $transactions
        return view('transaksi', compact('transactions', 'months'));
    }

    public function cancel($id_transaksi)
    {
        $transaction = Transaksi::where('id_transaksi', $id_transaksi)->firstOrFail(); // Find the transaction by ID
        $transaction->status_transaksi = 'ditolak'; // Update status to 'Dibatalkan'
        $transaction->save(); // Save the changes
        return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan.'); // Redirect back with success message
    }

    public function confirm(Request $request, $id_transaksi)
    {
        if ($request->isMethod('post')) { // Check if the request is POST
            $transaction = Transaksi::where('id_transaksi', $id_transaksi)->firstOrFail(); // Find the transaction by ID
            $transaction->status_transaksi = 'selesai'; // Update status to 'Dikonfirmasi'
            $transaction->save(); // Save the changes
            return redirect()->back()->with('success', 'Transaksi berhasil dikonfirmasi.'); // Redirect back with success message
        } else {
            abort(405); // Return Method Not Allowed response for other methods than POST
        }
    }

    // Di dalam method history() pada TransaksiController

    public function history(Request $request)
    {
        // Retrieve all transactions
        $transactions = Transaksi::all();

        // Initialize an empty array for months
        $months = [];

        // If a specific month is provided in the request, filter transactions by that month
        if ($request->has('month')) {
            $transactions = $transactions->filter(function ($transaction) use ($request, &$months) {
                // Extract month and year from the transaction date
                $monthYear = date('Y-m', strtotime($transaction->tanggal_transaksi));
                // Add the month to the $months array if it doesn't already exist
                if (!in_array($monthYear, $months)) {
                    $months[] = $monthYear;
                }
                // Return transactions matching the requested month
                return $monthYear == $request->month;
            });
        } else {
            // If no specific month is requested, populate the $months array with all unique months from transactions
            $months = $transactions->map(function ($transaction) {
                return date('Y-m', strtotime($transaction->tanggal_transaksi));
            })->unique()->values()->toArray();
        }

        // Pass transactions data and months to the view
        return view('riwayattransaksi', compact('transactions', 'months'));
    }
    public function download()
    {
        $transactions = Transaksi::all(); // Retrieve all transactions
        $pdf = new Dompdf();
        $pdf->loadHtml(view('riwayattransaksi', compact('transactions'))); // Pass data to the PDF view
        $pdf->setPaper('A4', 'landscape'); // Set paper size and orientation
        $pdf->render(); // Render the PDF

        return $pdf->stream('transactions.pdf'); // Stream the PDF for download
    }
    
}