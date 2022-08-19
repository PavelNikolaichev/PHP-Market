<?php

namespace Database\Seeders;

use App\Models\ShowroomCars;
use Carbon\Traits\Date;
use DateTime;
use Illuminate\Database\Seeder;

class ShowroomCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShowroomCars::factory(20)->create();

        ShowroomCars::factory(10)->create([
            'sign_sold' => 1,
        ]);

        ShowroomCars::factory(10)->create([
            'sign_sold' => 0,
        ]);

        ShowroomCars::factory(10)->create([
            'date_of_sale' => new DateTime('now'),
            'sign_sold' => 1,
        ]);
    }
}
