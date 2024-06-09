<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::create([
            'id_transaksi' => '001',
            'id_pelanggan' => null,
            'total_harga' => 100,
            'gambar_transfer' => 'gambar1.jpg',
            'tanggal_pesan' => now(),
            'tanggal_transaksi' => now(),
            'status_transaksi' => 'pending',
            'metode_pembayaran' => 'DP',
        ]);

        // Add more seed data as needed
    }
}
