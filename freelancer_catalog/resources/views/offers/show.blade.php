@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>{{ $offer->title }} ({{ $offer->deadline }})</h2>
                <div>
                    Description: {{$offer->description}}
                    <br>
                    Salary: {{$offer->maxSalary}}
                    <br>
                    Owner: {{$user->name}}
                </div>
                @auth
                    @if ( auth()->user()->id != $offer->user_id )
                        <a href="{{ url('/profile/' . $user->id) }}" class="btn btn-primary">View profile</a>
                        <a href="{{ route('offers.assignments.create', $offer) }}" class="btn btn-primary">Assign</a>
                    @else
                        <br>
                        <br>
                        <h3>List of candidates: </h3>
                        <table class="table table-striped">

                            <tr>
                                <th>Name</th>
                                <th>Notes</th>
                                <th>Provided Deadline</th>
                                <th>Expected Salary</th>
                                <th></th>
                            </tr>
                        @foreach( $offer->assignments as $assignment )

                            <tr>
                                <th>{{$assignment->user->name }}</th>
                                <th>{{$assignment->additional_information}}</th>
                                <th>{{$assignment->expected_deadline}}</th>
                                <th>{{$assignment->expected_salary}}</th>
                                <th><a class="btn btn-primary">Confirm</a></th>
                            </tr>
                        @endforeach
                    @endif
                @endauth


            </div>
        </div>
    </div>
@endsection
