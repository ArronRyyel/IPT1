<?php

namespace Database\Factories;

use App\Models\Dispatch;
use App\Models\Ambulance;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispatchFactory extends Factory
{
    protected $model = Dispatch::class;

    public function definition()
    {
        return [
            'ambulance_id' => Ambulance::factory(),
            'patient_id' => Patient::factory(),
            'dispatch_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'arrival_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'status' => $this->faker->randomElement(['Pending', 'En Route', 'Completed', 'Cancelled']),
            'location' => $this->faker->address,
        ];
    }
}
