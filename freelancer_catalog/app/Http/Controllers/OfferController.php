<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function latest()
    {
            $offers =  Offer::all();
            return view('welcome')->withOffers( $offers );
    }

    public function index()
    {
        $offers = Offer::all();

        return view('offers.index')->withOffers($offers);
    }


    public function create()
    {
        return view('offers.create');
    }


    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();
        return redirect()->route('offers.show', $offer );
    }


    public function show(Offer $offer)
    {
        return view('offers.show')->withOffer($offer);
    }


    public function edit(Offer $offer)
    {
        return view( 'offers.edit')->withOffer($offer);
    }


    public function update(Request $request, Offer $offer)
    {

        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();
        return redirect()->route('offers.show', $offer );
    }


    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }
}
