<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first 5 users
        $users = User::take(5)->get();

        // For each user, create 10 students
        foreach ($users as $user) {
            Student::factory()
                ->count(10)
                ->create([
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ]);
        }
    }
}
