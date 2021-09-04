<?php

namespace App\Http\Controllers\place;

use App\Http\Controllers\Controller;
use App\Http\Resources\place\PlaceResourceCollection;
use App\Models\OrderPlace\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlaceResourceCollection(Place::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Place::create($request->only('name'));

        return response('مکان سفارش با موفقیت ثبت شد', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderPlace\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderPlace\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $place->update($request->only('name'));
        return response('مکان سفارش با موفقیت به روز شد', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderPlace\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return response('مکان سفارش با موفقیت حذف شد', 200);
    }
}
