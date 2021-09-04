<?php

namespace App\Models\item;

use App\Models\Item;
use App\Models\Order\Order;
use App\Shamsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Entry extends Model
{
    use HasFactory, Shamsi;

    protected $appends = ['income'];

    protected $casts= [
        'order_income' => 'boolean'
    ];

    protected $fillable = [
        'entry',
        'quantity',
        'order_income',
        'discription',
        'invoice-img',
        'order_income',
        'deliver',
        'place'
        ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

//    public function getEntryAttribute($entry)
//    {
//        return $entry?'ورود به انبار': 'خروج از انبار';
//    }

    public function getCreatedAtAttribute($time)
    {
        return $this->convertToPersian($time);
    }

    /**
     * geturn specified text when invoice pic is not available
     * @param $pic
     * @return string
     */
    public function getPicAttribute($pic)
    {
        return $pic? $pic : 'محور سازان چیچست';
    }


    public function getIncomeAttribute()
    {
        return $this->order_income? 'رسیده' : 'در حال پردازش';
    }


    /**
     * //check input/output with available quantity in store
     * @param $item_id
     * @return $this
     * @throws ValidationException
     */
    public function entryValueCheck($item_id)
    {

        if (!$this->entry){
           $availableQuantity = Entry::where('item_id',$item_id)->whereEntry(true)->where('order_income', true)->sum('quantity')
               - Entry::where('item_id',$item_id)->whereEntry(false)->where('order_income', false)->sum('quantity');

           if ($availableQuantity < $this->quantity ) {
               throw ValidationException::withMessages([
                   'quantity' =>'مقدار خروجی بیشتر از موجودی انبار میباشد'
                   ]
               );
           }

        }



        return $this;
    }





}
