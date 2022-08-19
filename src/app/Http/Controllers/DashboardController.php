<?php

namespace App\Http\Controllers;

use App\Repositories\IShowroomCarsRepository;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct(private IShowroomCarsRepository $showroomCarsRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $data = [
            'avg_sold_total' => $this->showroomCarsRepository->getAvgPrice(),
            'avg_sold_today' => $this->showroomCarsRepository->getAvgPrice($today=true),
            'avg_sold_year' => $this->showroomCarsRepository
                ->getShowroomCarsInPeriod(new DateTime('-1 year'), new DateTime('now')),
            'unsold_cars' => $this->showroomCarsRepository->getUnsoldCars(),
            'cars_on_sale' => $this->showroomCarsRepository->getOnSaleCars(),
        ];

        return view('carShowroomDashboard', $data);
    }
}
