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

    public function getAvgPrice(?DateTime $date=null): int|float|null
    {
        if ($date === null) {
            return ShowroomCars::all()->avg('price');
        }

        return ShowroomCars::all()->where('date_of_sale', '=', $date)->pluck('price')->avg();
    }

    public function getShowroomCarsInPeriod(?DateTime $start_period, ?DateTime $end_period)
    {
        return ShowroomCars::with('relatedModel')
            ->whereBetween('date_of_sale', [$start_period, $end_period])
            ->get();
    }

    public function getUnsoldCars()
    {
        // Sort by desc year and by asc price TODO: find a way to make a 2-level sort
        return ShowroomCars::with('relatedModel')
            ->where('sign_sold', '=', '0')
//            ->orderByDesc('year_of_production')
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
