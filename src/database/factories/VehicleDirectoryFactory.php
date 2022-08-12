<?php

namespace Database\Factories;

use App\Models\ShowroomCars;
use App\Models\VehicleDirectory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleDirectory>
 */
class VehicleDirectoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => fake()->word(),
            'year_of_production' => fake()->year(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (VehicleDirectory $vehicleDirectory) {
            ShowroomCars::factory(3)->create(['vehicle_directory_id' => $vehicleDirectory->id]);
        });
    }
}
