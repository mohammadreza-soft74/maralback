<?php

namespace App\Http\Controllers\man;

use App\Http\Controllers\Controller;
use App\Http\Resources\man\ManResourceCollection;
use App\Models\Repairer\Man;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchController extends Controller
{
    public function manSearch(Request $request)
    {
        if (!is_null($request->name))
        {
            $man = Man::where('name', 'like', '%' . $request->name . '%' )->get();

            return new ManResourceCollection( $man );
        }

    }
}
