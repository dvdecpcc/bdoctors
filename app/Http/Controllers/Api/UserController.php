<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $myReviews = DB::table('reviews')
        ->select('user_id',DB::raw('round(AVG(vote),0) as avgVote'))
        ->groupBy('user_id')
        ->get();

        $myReviewsTable = Review::all();
        
        $allUsers = User::with(['specializations','reviews'])
        ->get(['id','name','surname','slug','profile_pic']);


         
        return response()->json([
            'success' => true,
            'results' => $allUsers, 
            'media' => $myReviews,
            'reviews' => $myReviewsTable
        ]);
     
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug' , $slug)->with('specializations')->first();

        if($user){
            return response()->json([
                'success' => true,
                'resolve' => $user
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'user non trovato'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
};

    
