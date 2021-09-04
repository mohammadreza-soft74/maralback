<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Http\Resources\Entry\EntryResource;
use App\Http\Resources\Entry\EntryResourceCollection;
use App\Http\Resources\Entry\Search\EntrySearchResource;
use App\Http\Resources\Entry\Search\EntrySearchResourceCollection;
use App\Models\item\Entry;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EntrySearchController extends Controller
{
    public function todayEntries()
    {
        $todayEntries = Entry::whereDate('created_at', Carbon::today())->whereEntry(true)->get();


        return new EntrySearchResourceCollection($todayEntries);
    }

    public function searchByDate(Request $request)
    {
        $from = Carbon::today();

        $to = Carbon::now();

        if ($request->has('from') && $request->has('to'))
        {
            $from = $request->from;


            $to = new Carbon($request->to);
            $to = $to->addDay();

        }



        return new EntrySearchResourceCollection(Entry::whereBetween('created_at', [$from, $to])
            ->orderBy('created_At', 'DESC')->paginate(30));

    }

    public function searchCheckoutByDate(Request $request)
    {
        $from = Carbon::today();

        $to = Carbon::now();

        if ($request->has('from') && $request->has('to'))
        {
            $from = $request->from;


            $to = new Carbon($request->to);
            $to = $to->addDay();

        }



        return new EntrySearchResourceCollection(Entry::whereBetween('created_at', [$from, $to])
            ->where('entry', false)->orderBy('created_At', 'DESC')->paginate(30));
    }

}
