<?php

namespace App\Http\Controllers;

use App\Exceptions\ReviewNotBelongsToUser;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Model\Guitar;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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

    public function index(Guitar $guitar)
    {
        return ReviewResource::collection( $guitar->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Guitar $guitar)
    {
        $review = new Review();
        $review->review = $request->review;
        $review->star = $request->star;
        $review->user_id = Auth::id();
        $review->guitar_id = $guitar->id;

        $review->save();

        return response([
            "data"=> "New Entry"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guitar $guitar,Review $review)
    {
        $this->checkIfBelongsToUser($review);
        
        $review->update($request->all());
        
        return response([
            "data"=> "Review Updated"
        ],202 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guitar $guitar, Review $review)
    {
        $this->checkIfBelongsToUser($review);
        
        $review->delete($review);
        
        return response([
            "data"=> "Review destroyed"
        ],202 );
    }


    public function checkIfBelongsToUser(Review $review)
    {
        if ($review->user_id !== Auth::id())
        {
            throw new ReviewNotBelongsToUser();
        }
    }
}
