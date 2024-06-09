<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $timestamps = false;
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_transaksi',
        'id_pelanggan',
        'total_harga',
        'gambar_transfer',
        'tanggal_pesan',
        'tanggal_transaksi',
        'status_transaksi',
        'metode_pembayaran',
    ];
}
