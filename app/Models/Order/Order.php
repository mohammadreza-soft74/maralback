<?php

namespace App\Models\Order;

use App\Models\Item;
use App\Models\item\Entry;
use App\Models\OrderPlace\Place;
use App\Models\Repairer\Man;
use App\Shamsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory , Shamsi;

    protected $fillable = [
        'invoiceNo',
        'place',
        'quantity'
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function men()
    {
       return $this->belongsTo(Man::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function getCreatedAtAttribute($time)
    {
        return $this->convertToPersian($time);
    }
}
