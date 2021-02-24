<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Guitar;

class Review extends Model
{
    public function guitar()
    {
        return $this->belongsTo(Guitar::class);
    }
}
 