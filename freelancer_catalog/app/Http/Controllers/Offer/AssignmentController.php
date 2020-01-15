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


    public function assigned()
    {
        return view('assignment.assigned');
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

        //return redirect()->route('assignment.assigned');
        return redirect()->route('profile.index', [$offer, $assignment]);
    }

}
