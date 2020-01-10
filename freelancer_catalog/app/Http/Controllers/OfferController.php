<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    //
    public function latest()
    {
            $offers =  Offer::all();
            return view('welcome')->withOffers( $offers );
    }
}
