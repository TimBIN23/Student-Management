<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the admin user with the username and password
        User::firstOrCreate([
            'email' => 'admin@dev.com'
        ], [
            'name' => 'Admin Dev',
            'password' => Hash::make('123'),
        ]);
    }
}
