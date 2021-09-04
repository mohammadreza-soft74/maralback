<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Entry\EntryResource;
use App\Http\Resources\Entry\EntryResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'man' => $this -> men->name,
            'invoice' => $this -> invoiceNo,
            'place' => $this -> place -> name,
            'entries' => new EntryResourceCollection($this-> entries->where('entry', true)),
            'created' => $this->created_at,
        ];
    }
}
