<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\User\UserResource;
use App\User;
use Illuminate\Http\Resources\Json\Resource;

class ReviewResource extends Resource
{
    
    public function toArray($request)
    {

        return [
            "review"=> $this->review,
            "owner"=>new UserResource( $this->user),
            "star"=> $this->star,
        ];
    }
}
