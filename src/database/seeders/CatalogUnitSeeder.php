<?php

namespace Database\Seeders;

use App\Models\CatalogUnit;
use Illuminate\Database\Seeder;

class CatalogUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogUnit::factory(10)->product()->create();
        CatalogUnit::factory(10)->service()->create();

        CatalogUnit::factory()->create([
            'type' => 'Product',
            'price' => 1000,
        ]);
    }
}
