<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call the individual seeders
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
