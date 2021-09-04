<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryStoreRequest;
use App\Http\Resources\Entry\EntryResource;
use App\Http\Resources\Entry\EntryResourceCollection;
use App\Models\Item;
use App\Models\item\Entry;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EntryResourceCollection
     */
    public function index()
    {
        return new EntryResourceCollection(Entry::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryStoreRequest $request)
    {
        $item = Item::findOrFail($request->item_id);
        $order = Order::all()->random(1)->first() -> id;
        if ($request->entry == 1)
        {
            $order = Order::findOrFail($request->order_id);
        }




        $entry = new Entry($request->only([
            'entry',
            'quantity',
            'order_income',
            'discription',
            'invoice-img',
            'deliver',
            'place'
        ]));

        $entry->entryValueCheck($request->item_id)->item()->associate($item);
        $entry->order()->associate($order)->save();

        return response([
           'message' => 'با موفقیت ثبت شد'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        return new EntryResource($entry);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {

        if ($entry->order_income == true)
        {
            throw ValidationException::withMessages([
                'income' => 'وضعیت ورودی یکبار قابل تغییر است'
            ]);
        }

        $entry->update($request->only(['entry', 'quantity', 'discription', 'order_income']));

//        if (is_null($request->item_id))
//            $item = Item::findOrFail($request->item_id);

        //todo : we are not update quantity we just update order income at this time
        //$entry->entryValueCheck($request->item_id)->item()->associate($item)->save();

        return response([
            'message' => 'با موفقیت به روز رسانی شد'
        ], 201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        if($entry->delete())
            return response([
                'message' => 'با موفقیت خذف شد'
            ]);

    }
}
