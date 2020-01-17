@extends('layouts.app')

@section('content')
    <style>
        input{
            margin: 10px;
            width: 150px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Offers:</h2>
                <form method="get" action="{{ route('offers.index') }}">
                    {{ csrf_field() }}
                    minSalary <input type="text" name="min_salary" value="{{ old("min_salary") }}">
                    maxDeadline: <input type="date" name="max_deadline" value="{{ old("max_deadline") }}">
                    <input type="submit" class="btn btn-primary" value="Filter">
                </form>
                <br>

                <a href="{{ route('offers.create') }}">Create new...</a>

                <ul>
                    @foreach($offers as $offer)
                        <li>
                            <strong>{{ $offer->title }}</strong>
                            <a href="{{ route('offers.show', $offer) }}">details</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
