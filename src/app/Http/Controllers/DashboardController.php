<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\CatalogUnit;
use App\Models\ShowroomCars;
use App\ValueObjects\CartObject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $data = [
            'avg_sold_total' => 0,
            'avg_sold_today' => 0,
            'avg_sold_year' => [0 => 10],
            'unsold_cars' => ShowroomCars::with('relatedModel')->get()->random(2),
            'cars_on_sale' => ShowroomCars::with('relatedModel')->get()->random(3),
            'sold_cars' => 0,
        ];

        return view('CarShowroomDashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function destroy(Attribute $attribute)
    {
        //
    }
}
