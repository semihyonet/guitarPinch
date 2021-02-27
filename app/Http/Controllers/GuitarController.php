<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuitarRequest;
use App\Http\Resources\Guitar\GuitarCollection;
use App\Http\Resources\Guitar\GuitarResource;
use App\Model\Guitar;
use Illuminate\Http\Request;

class GuitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        return GuitarCollection::collection( Guitar::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "WHOOO";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuitarRequest $request)
    {
        $guitar = new Guitar;
        $guitar->model = $request->model;
        $guitar->pickups = $request->pickups;
        $guitar->body_shape = $request->body_shape;
        $guitar->string = $request->string;

        $guitar->save();

        return response(
            [
                "data"=>new GuitarResource($guitar)
            ],
            201
        );    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function show(Guitar $guitar)
    {
        return new GuitarResource($guitar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guitar $guitar)
    {
        $guitar->update($request->all());

        return response(
            ["data"=>new GuitarResource($guitar)],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guitar $guitar)
    {
        $guitar->delete();

        return response(null, 204);
    }
}
