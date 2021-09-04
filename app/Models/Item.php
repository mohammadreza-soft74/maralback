<?php

namespace App\Models;

use App\Models\item\Entry;
use App\Models\Order\Order;
use App\Shamsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, Shamsi;

    protected $fillable = ['name', 'code', 'description', 'minimum'];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }


    public function getCreatedAtAttribute($time)
    {
        return $this->convertToPersian($time);
    }








}
