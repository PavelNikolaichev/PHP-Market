<?php

namespace Database\Seeders;

use App\Models\VehicleDirectory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleDirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleDirectory::factory(20)->create();
    }
}
