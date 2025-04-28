<?php

namespace Database\Factories;

use App\Models\Ambulance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AmbulanceFactory extends Factory
{
    protected $model = Ambulance::class;

    public function definition()
    {
        return [
            'license_plate' => $this->faker->unique()->bothify('??-####'),
            'model' => $this->faker->word,
            'status' => $this->faker->randomElement(['Available', 'In-Use', 'Under Maintenance']),
            'location' => $this->faker->city,
            'assigned_to' => \App\Models\User::factory(),
        ];
    }
}

