<?php

namespace App\Http\Controllers\Offer;


use App\Assignment;
use App\User;
use Illuminate\Http\Request;
use App\Offer;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index( )
    {
        //useless
        return view('assignment.create');
    }

    public function create( Offer $offer )
    {
        $user = User::find($offer->user_id);
        return view('offers.assignment.create')->withOffer( $offer )->withUser($user);
    }


    public function store(Request $request, Offer $offer)
    {
        $assignment = new Assignment();
        $assignment->expected_deadline = $request->expected_deadline;
        $assignment->expected_salary = $request->expected_salary;
        $assignment->additional_information = $request->additional_information;
        $assignment->user_id = auth()->user()->id;
        $assignment->status = 'Pending';
        $offer->assignments()->save($assignment);

        return redirect()->route('profile.index', [$offer, $assignment]);
    }

    public function show(Offer $offer, Assignment $assignment )
    {
        $assignment->status = 'Accepted';
        //$offer->assignments()->save($assignment);
        $assignment->save();
        return redirect()->route('offers.show', [$offer, $assignment]);
    }

    public function edit(Offer $offer, Assignment $assignment )
    {
        $assignment->status = 'Confirmed';
        $assignment->save();
        //$offer->assignments()->save($assignment);
        //$offers = $offer->assignments();
        //$offers->where('status', '!=', 'Confirmed')->delete();
        Assignment::where([ ['status', '!=', 'Confirmed'],
                            ['offer_id', '=', $assignment->offer_id] ])->delete();

        return redirect()->route('profile.index', [$offer, $assignment]);

    }

    public function destroy( Offer $offer, Assignment $assignment )
    {
        $assignment->status = 'Resigned';
        $assignment->save();
        Assignment::where( ['status', '=', 'Resigned'])->delete();

        return redirect()->route('profile.index', [$offer, $assignment]);

    }


}
