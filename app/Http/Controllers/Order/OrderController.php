<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrderResourceCollection;
use App\Models\Item;
use App\Models\item\Entry;
use App\Models\Order\Order;
use App\Models\OrderPlace\Place;
use App\Models\Repairer\Man;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new OrderResourceCollection(Order::orderBy('created_At', 'DESC')->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $man = Man::findOrFail($request->men_id);
        $place = Place::findOrFail($request->place_id);


        $order = new Order($request->only([
            'invoiceNo',

        ]));

        $order->place()->associate($place);
        $order->men()->associate($man)->save();


//        $entries = [] ;
//
//        foreach ($request -> entries  as $entry)
//        {
//            $entries[] = new Entry($entry);
//        }


        //$order -> entries() ->saveMany($entries);


        return $order;


        return response([
            'message' => 'با موفقیت ثبت شد'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->only('invoiceNo'));

        return response('به روز شد', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function destroy(Order $order)
    {
        $order->delete();

        return response([
            'message' => 'با موفقیت خذف شد'
        ]);
    }
}
