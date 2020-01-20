<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Offer;
use App\User;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function index( )
    {
        //useless
        //return view('rating.create');
    }

    public function create()
    {
        $users = User::where('id','=',$id)->first();
       $rating = Rating::where('user_id','=',$id);
       var_dump($users);
       return view('rating.create', $id)->withUsers($users)->withRating($rating);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $rating = new Rating();
        $rating->lead_time = $request->lead_time;
        $rating->quality = $request->quality;
        $rating->final_result = $request->final_result;
        $rating->additional_information = $request->additional_information;
        $rating->rating_id=$user->id;
        $rating->user_id = auth()->user()->id;
        $user->assignments()->save($rating);

        return redirect()->route('profile.index', [$rating, $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
