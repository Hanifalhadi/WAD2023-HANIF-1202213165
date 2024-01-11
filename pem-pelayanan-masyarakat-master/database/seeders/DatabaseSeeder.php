<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::create([
            'name_petugas' => 'Adminstrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'level' => 'admin',
        ]); 
    }
}
