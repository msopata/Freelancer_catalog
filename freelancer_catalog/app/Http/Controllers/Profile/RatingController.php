<?php

namespace App\Http\Controllers\Profile;

use App\Assignment;
use App\Offer;
use App\User;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class RatingController extends Controller
{

    public function index( )
    {
        //useless
        //return view('rating.create');
    }

    public function create(User $user)
    {
        //$offers = User::all()->where('$user_id','=',$users->id);
        //return view('profile.rating.create', [$users->id])->withOffers( $offers )->withUsers($users);
        //echo URL::current();
        $url = url()->current();
        $users=User::find(substr($url, -15,1));
        $users = User::all()->where('id','=',$users->id)->first();
        $offers = Offer::all()->where('user_id','=',$users->id);

       return view('profile.rating.create')->withUsers($users)->withOffers($offers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $url = url()->current();
        //$users=User::all()->find(substr($url, -8,1));

        $id_u=substr($url, -8,1);
        echo $id_u;
        $rating = new Rating();
        $rating->lead_time = $request->lead_time;
        $rating->quality = $request->quality;
        $rating->final_result = $request->final_result;
        $rating->additional_information = $request->additional_information;
        $rating->rating_id=auth()->user()->id;
        $rating->user_id = $id_u;
        //$user->ratings()->
        $rating->save();

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
