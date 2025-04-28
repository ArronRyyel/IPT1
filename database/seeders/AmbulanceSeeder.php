<?php

namespace Database\Seeders;

use App\Models\Ambulance;
use Illuminate\Database\Seeder;

class AmbulanceSeeder extends Seeder
{
    public function run()
    {
        Ambulance::factory(5)->create(); // Adjust based on your needs
    }
}
