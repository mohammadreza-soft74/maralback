<?php

namespace App\Http\Resources\item;

use Illuminate\Http\Resources\Json\JsonResource;

class itemSearchResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this -> code,
            'description' => $this->description,
            'count' => $this->entries->where('entry', true)->where('order_income')->sum('quantity') - $this->entries->where('entry', false)->where('order_income')->sum('quantity')
        ];
    }
}
