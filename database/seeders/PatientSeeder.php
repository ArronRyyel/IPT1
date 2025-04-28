<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run()
    {
        Patient::factory(5)->create(); // Adjust the number based on how many patients you want to seed
    }
}

