<?php
namespace Database\Seeders;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        Employer::all()->each(function ($employer) {
            Job::factory(2)->create(['employer_id' => $employer->id]);
        });
    }
}


