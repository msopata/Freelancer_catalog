<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offer;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $offers = Offer::where('owner', $user_id)->orderBy('id','desc')->get();

        return view('profile.index')->withOffers( $offers );
    }
}
