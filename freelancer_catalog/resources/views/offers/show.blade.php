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

                        <a href="{{ route('offers.assignments.create', $offer) }}" class="btn btn-primary">Assign</a>

                    @else
                        <br>
                        <br>
                        @foreach( $offer->assignments as $as )
                            @if ( $as->status == 'Confirmed')
                                <h4><strong>Assignment have been confirmed!</strong></h4>
                                <h5><p>It is in works currently.</p></h5>
                                <br>
                                <h4><strong>Contractor: {{$as->user->name}}</strong></h4>
                                <p>Deadline: {{$as->expected_deadline}}</p>
                                <p>Cost: {{$as->expected_salary}}</p>
                                <p>Additional information: {{$as->additional_information}}</p>
                                @break 2
                            @endif

                        @endforeach

                        <h3>List of candidates: </h3>
                        <table class="table table-striped">

                            <tr>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Provided Deadline</th>
                                <th>Expected Salary</th>
                                <th>Status</th>
                            </tr>

                        @foreach( $offer->assignments as $assignment )
                            <tr>
                                @foreach( $offer->assignments as $ass)
                                    @if ($ass->status == 'Pending')
                                        @continue
                                    @elseif ($ass->status == 'Accepted')
                                        @php
                                            $var = 1;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ( $var ?? '' == 1 )
                                        <th>{{$assignment->user->name}}</th>
                                        <th>{{$assignment->additional_information}}</th>
                                        <th>{{$assignment->expected_deadline}}</th>
                                        <th>{{$assignment->expected_salary}}</th>
                                        @if ( $assignment->status == 'Accepted')
                                            <th>Waiting for confirmation</th>
                                        @else
                                            <th>In queue</th>
                                        @endif

                                @elseif ($assignment->status != 'Confirmed')
                                    <th>{{$assignment->user->name}}</th>
                                    <th>{{$assignment->additional_information}}</th>
                                    <th>{{$assignment->expected_deadline}}</th>
                                    <th>{{$assignment->expected_salary}}</th>
                                    <th><a href="{{route('offers.assignments.show', [$offer, $assignment])}}" class="btn btn-primary">Accept</a></th>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                @endauth

            </div>
        </div>
    </div>
@endsection
