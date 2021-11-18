<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'nama' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('user1234'),
        ]);
    }
}
