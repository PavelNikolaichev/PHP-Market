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
            return ShowroomCars::avg('price');
        }

        return ShowroomCars::whereBetween('date_of_sale', [new DateTime('yesterday'), new DateTime('tomorrow')])
            ->avg('price');
    }

    public function getShowroomCarsInPeriod(?DateTime $start_period, ?DateTime $end_period)
    {
        return ShowroomCars::selectRaw("count(*) as total, DATE(date_of_sale) as day")
            ->whereBetween('date_of_sale', [$start_period, $end_period])
            ->groupBy('day')
            ->get()
            ->sortBy('day');
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
