<?php

namespace Database\Factories;

use App\Models\VehicleDirectory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShowroomCars>
 */
class ShowroomCarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vehicle_directory_id' => VehicleDirectory::all()->random()->id,
            'color' => fake()->colorName(),
            'price' => fake()->randomDigitNotNull,
            'sign_sold' => fake()->word(),
            'date_of_sale' => fake()->dateTime(),
        ];
    }
}
