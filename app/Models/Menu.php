<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel
    protected $table = 'menu';
    public $timestamps = false;
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'id_menu',
        'kategori_menu',
        'nama_menu',
        'harga_menu',
        'deskripsi',
        'foto_menu_path',
        'status_menu',
    ];
}
