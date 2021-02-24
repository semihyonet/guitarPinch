<?php

namespace App\Http\Resources\Guitar;

use Illuminate\Http\Resources\Json\Resource;

class GuitarResource extends Resource
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
            "model"=> $this->model,
            "pickups"=> $this->pickups,
            "body_shape"=> $this->body_shape,
            "strings"=>$this->string,
            "rating"=> $this->reviews->count() > 0? round($this->reviews->sum("star") / $this->reviews->count(),2 ): 0,
            "href"=> [
                "reviews"=>route('reviews.index',$this->id)
            ]
        ];
    }
}
