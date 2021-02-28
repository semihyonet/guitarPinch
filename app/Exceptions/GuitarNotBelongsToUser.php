<?php

namespace App\Exceptions;

use Exception;

class GuitarNotBelongsToUser extends Exception
{
    public function render()
    {
        return response([
            "data"=> "The user does not own this guitar!"
        ],403);
    }
}
