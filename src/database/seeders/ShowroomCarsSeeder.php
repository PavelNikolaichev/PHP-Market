<?php

namespace Database\Seeders;

use App\Models\ShowroomCars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}
