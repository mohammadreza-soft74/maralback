<?php

namespace App\Http\Resources\Entry\Search;

use Illuminate\Http\Resources\Json\JsonResource;

class EntrySearchResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->item -> name ,
            'orderMan' => $this->order->men->name,
            'quantity' => $this->quantity,
            'description' => $this->discription,
            'order_income' => $this-> order_income,
            'income' => $this->income,
            'deliver' => $this->deliver,
            'created' => $this->created_at
        ];
    }
}
