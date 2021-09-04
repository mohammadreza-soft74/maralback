<?php

namespace App\Http\Controllers\item;

use App\Http\Controllers\Controller;
use App\Http\Resources\item\ItemResourceCollection;
use App\Http\Resources\item\itemSearchResourceCollection;
use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function itemSearch(Request $request)
    {






            $item = Item::where('name', 'like', '%' . $request->name . '%' )->paginate(20);

            return new ItemResourceCollection( $item );



    }


}
