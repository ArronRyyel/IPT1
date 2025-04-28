<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use Illuminate\Database\Seeder;

class DispatchSeeder extends Seeder
{
    public function run()
    {
        Dispatch::factory(5)->create(); // Adjust the number based on your needs
    }
}
