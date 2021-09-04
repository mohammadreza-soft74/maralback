<?php

namespace App\Http\Resources\Entry;

use App\Shamsi;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
{
    use Shamsi;
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
            'place' => $this->place,
            'Entry' => $this->entry,
            'quantity' => $this->quantity,
            'description' => $this->discription,
            'order_income' => $this-> order_income,
            'income' => $this->income,
            'pic' => $this->pic,
            'entryCount' => $this->entryCount,
            'created' => $this->created_at

        ];
    }
}
