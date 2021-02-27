<?php
namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


trait ExceptionTrait
{
    public function apiException($request, $e)
    {

        if( $e instanceof NotFoundHttpException)
        {
            return Response(
                ["errors"=> "There is no such route"],
                404
            );
        }
        if( $e instanceof ModelNotFoundException)
        {
            return Response(
                ["errors"=> "There are no models with that ID"],
                404
            );
        }
        
        return Response(
            ["errors"=> "Undefined ERROR",
            "code"=> $e
        ],
            404
        );
    }
}