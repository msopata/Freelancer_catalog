@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $offer->title }} ({{ $offer->deadline }})</h2>
                <div>
                    {{$offer->description}}
                </div>


                <a href="{{ route('offers.edit', $offer) }}">edit</a>

                <form method="post" action="{{ route('offers.destroy', $offer) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection
