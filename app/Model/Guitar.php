<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Guitar extends Model
{
    protected $fillable = [
        "model", "pickups","body_shape", "string"
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
