<?php

namespace App\Http\Controllers\place;

use App\Http\Controllers\Controller;
use App\Http\Resources\place\PlaceResourceCollection;
use App\Models\OrderPlace\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchController extends Controller
{
    public function placeSearch(Request $request)
    {
        if (!is_null($request->name))
        {
            $places = Place::where('name', 'like', '%' . $request->name . '%' )->get();

            return new PlaceResourceCollection( $places );
        }


    }
}
