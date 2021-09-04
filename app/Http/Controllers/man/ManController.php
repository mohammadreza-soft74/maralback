<?php

namespace App\Http\Controllers\man;

use App\Http\Controllers\Controller;
use App\Http\Resources\man\ManResourceCollection;
use App\Models\OrderPlace\Place;
use App\Models\Repairer\Man;
use Illuminate\Http\Request;

class ManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ManResourceCollection(Man::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Man::create($request->only('name'));
        return response('با موفقیت ثبت شد', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repairer\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function show(Man $man)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repairer\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Man $man)
    {
        $man->update($request->only('name'));
        return response('پرسنل با موفقیت به روز شد', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repairer\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function destroy(Man $man)
    {
        $man->delete();
        return response('شخص با موفقیت حذف شد', 200);
    }
}
