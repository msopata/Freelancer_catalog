<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offer;
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
    public function show(User $user)
    {
        $url= url()->current();
        $users = User::find(substr($url,-1));

        return view('profile.show', $users)->withOffers($users->offers)->withRatings($users->ratings);
    }
}
