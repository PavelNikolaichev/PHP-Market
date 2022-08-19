<?php

namespace App\Repositories;

use App\Models\ShowroomCars;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class ShowroomCarsRepository implements IShowroomCarsRepository
{
    public function getShowroomCars(): Collection
    {
        return ShowroomCars::all();
    }

    public function getAvgPrice(?bool $today=null): int|float|null
    {
        if ($today === null || $today === false) {
            return ShowroomCars::all()->avg('price');
        }

        return ShowroomCars::whereBetween('date_of_sale', [new DateTime('yesterday'), new DateTime('tomorrow')])
            ->pluck('price')
            ->avg();
    }

    public function getShowroomCarsInPeriod(?DateTime $start_period, ?DateTime $end_period)
    {
        // get count of cars sold in each day of the period
//        return ShowroomCars::all()
//            ->whereBetween('date_of_sale', [$start_period, $end_period])
//            ->groupBy('date_of_sale')
//            ->count();
        return ShowroomCars::with('relatedModel')
            ->whereBetween('date_of_sale', [$start_period, $end_period])
            ->distinct('date_of_sale')
            ->groupBy('date_of_sale');
    }

    public function getUnsoldCars()
    {
        return ShowroomCars::query()
            ->join('vehicle_directories', 'vehicle_directories.id', '=', 'showroom_cars.vehicle_directory_id')
            ->where('sign_sold', '=', '0')
            ->orderByDesc('vehicle_directories.year_of_production')
            ->orderBy('price')
            ->get();
    }

    public function getOnSaleCars()
    {
        return ShowroomCars::with('relatedModel')
            ->where('sign_sold', '=', '1')
            ->get();
    }
}
