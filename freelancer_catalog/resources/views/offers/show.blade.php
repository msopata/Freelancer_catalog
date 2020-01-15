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

                        <a href="{{ route('offers.assignments.create', $offer) }}">Assign</a>

                    @endif
                <!--
                    <form action="/assignments">
                    <input type="submit" value="Assign">
                    </form> -->
                @endauth


            </div>
        </div>
    </div>
@endsection
