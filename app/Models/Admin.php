<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    public $timestamps = false;
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_admin',
        'nama',
        'password',
    ];
}
