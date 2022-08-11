<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\CatalogUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CatalogUnit>
 */
class CatalogUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->words(3, true),
            'price' => fake()->randomDigitNotNull,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (CatalogUnit $catalogUnit) {
            Attribute::factory(3)->create(['catalog_unit_id' => $catalogUnit->id]);
        });
    }

    public function service()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'Service',
            ];
        });
    }

    public function product()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'product',
            ];
        });
    }
}
