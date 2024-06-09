<?php

namespace App\Models;

use App\Models\Pelanggan;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = "ulasan";
    protected $fillable = [
        'id_ulasan',
        'id_pelanggan',
        'id_menu',
        'rating',
        'komentar',
        'foto_menu_path',
        'tgl',
    ];

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(Pelanggan::class, 'nama');
    }

    // Define the relationship with the pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}