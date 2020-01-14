<?php

namespace App\Http\Controllers;


use App\Assignment;
use Illuminate\Http\Request;
use App\Offer;

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
        return view('assignment.create')->withOffer( $offer );
    }


    public function assigned()
    {
        return view('assignment.assigned');
    }

    public function store(Request $request)
    {
        $assignment = new Assignment();
        $assignment->expected_deadline = $request->expected_deadline;
        $assignment->expected_salary = $request->expected_salary;
        $assignment->additional_information = $request->additional_information;
        $assignment->user_id = auth()->user()->id;
        $assignment->offer_id = 2;
        //$assignment->offer_id = $offer->id;
        $assignment->save();

        //return redirect()->route('assignment.assigned');
        return redirect()->route('profile.index');
    }

}
