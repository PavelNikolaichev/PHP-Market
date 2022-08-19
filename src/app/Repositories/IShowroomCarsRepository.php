<?php

namespace App\Repositories;

use DateTime;

interface IShowroomCarsRepository
{
    public function getShowroomCars();
    public function getShowroomCarsInPeriod(?DateTime $start_period, ?DateTime $end_period);
    public function getAvgPrice(?bool $today);
    public function getUnsoldCars();
    public function getOnSaleCars();
}
