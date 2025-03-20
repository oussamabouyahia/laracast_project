<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;

use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing users and create an employer for each
        User::all()->each(function ($user) {
            Employer::factory()->create(['user_id' => $user->id]);
        });
    }
}
