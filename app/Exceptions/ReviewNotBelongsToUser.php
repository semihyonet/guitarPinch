<?php

namespace App\Exceptions;

use Exception;

class ReviewNotBelongsToUser extends Exception
{
    public function render(){
        return response([
            "data"=> "The user does not own this guitar!"
        ],403);
    }
}
