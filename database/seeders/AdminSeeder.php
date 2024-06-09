<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default admin user
        Admin::create([
            'nama' => 'sans',
            'password' => Hash::make('sans'), // Change 'password' to your desired password
        ]);
    }
}
