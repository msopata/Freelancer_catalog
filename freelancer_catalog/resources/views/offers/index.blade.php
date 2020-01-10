@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Offers:</h2>

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
