<?php

namespace App\Http\Resources\item;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $availableCount = $this->entries->where('entry', true)->where('order_income', true)->sum('quantity') - $this->entries->where('entry', false)->where('order_income', false)->sum('quantity');

        $minimumColor = $availableCount <= $this->minimum ? 'secondary' : '' ;


        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'minimumColor' => $minimumColor,
            'minimum' => $this->minimum,
            'count' => $availableCount,
            'created' => $this->created_at,
        ];
    }
}
