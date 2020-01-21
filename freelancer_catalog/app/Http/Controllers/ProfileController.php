<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offer;
use App\Rating;
use Illuminate\Routing\UrlGenerator;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        //$offers = Offer::where('id', $user_id)->orderBy('id','desc')->get();
        $user = User::find($user_id);

        return view('profile.index')->withOffers($user->offers)->withAssignments($user->assignments);
    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {

        $users = User::find($id);
        $offers = Offer::all()->where('user_id',$id);
        $ratings = Rating::all()->where('user_id','=',$id);

        //return view('profile.show', [$offers, $users])->withRatings($ratings);
        return view('profile.show',[$id])->withUsers($users)->withOffers($offers)
            ->withRatings($ratings);
    }
}
