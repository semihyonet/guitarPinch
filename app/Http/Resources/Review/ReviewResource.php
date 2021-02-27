<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\Resource;

class ReviewResource extends Resource
{
    
    public function toArray($request)
    {
        return [
            "review"=> $this->review,
            "owner"=> $this->owner,
            "star"=> $this->star,
        ];
    }
}
