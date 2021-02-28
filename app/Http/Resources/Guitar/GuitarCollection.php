<?php

namespace App\Http\Resources\Guitar;

use Illuminate\Http\Resources\Json\Resource;

class GuitarCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {  
        return [
            "model"=> $this->model,
            "rating"=> ($this->reviews->count() > 0)? round($this->reviews->sum("star") / $this->reviews->count(),2 ): -1,
            "href"=> [
                "link"=>route('guitars.show',$this->id)
            ]
        ];
    }
}
