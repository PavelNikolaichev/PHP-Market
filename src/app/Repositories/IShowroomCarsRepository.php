<?php

namespace App\Repositories;

interface IShowroomCarsRepository
{
    public function getShowroomCars($showroomId);
    public function getAvgPrice($date);
}
