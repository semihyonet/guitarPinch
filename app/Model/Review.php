<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Guitar;
use App\User;

class Review extends Model
{
    protected $fillable = [
        "review", "star"
    ];
    public function guitar()
    {
        return $this->belongsTo(Guitar::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
 