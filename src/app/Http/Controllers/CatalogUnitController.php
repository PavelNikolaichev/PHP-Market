<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\CatalogUnit;
use App\ValueObjects\CartObject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CatalogUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $data = [
            'catalog_units' => CatalogUnit::all()
        ];

        CatalogUnit::where('type', 'Service')->get()->each(function (CatalogUnit $catalogUnit) use (&$data) {
            $catalogUnit->attributes()->get()->each(function (Attribute $attribute) use ($catalogUnit, &$data) {
                if ($attribute->name === 'RelatedProducts') {
                    $data['services'][] = $catalogUnit;
                }
            });
        });

//        $services = CatalogUnit::with('attributes')->where('type', 'Service')->where('rel_type', $data['catalogUnits'][0]->type)->get();
//        $data['services'] = $services;

        $cart_hist = [];
        $cart_hist[] = (new CartObject())->add($data['catalog_units'][0]);
        $cart_hist[] = (clone end($cart_hist))->add($data['catalog_units'][2]);
        $cart_hist[] = (clone end($cart_hist))->add($data['catalog_units'][4], 0);
        $cart_hist[] = (clone end($cart_hist))->add($data['catalog_units'][5], 0);
        $cart_hist[] = (clone end($cart_hist))->remove(0);
        $data['cart_hist'] = $cart_hist;

        return view('catalog', $data);
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
