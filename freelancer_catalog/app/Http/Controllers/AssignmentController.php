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

    public function index()
    {
        return view('assignment.create');
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
        $assignment->user_id = auth()->user()->id;
        $assignment->offer_id = 9;
        $assignment->save();

        return redirect()->route('assignment.assigned');
    }

}
