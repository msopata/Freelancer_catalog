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
                    <form method="post" action="{{ route('offers.edit', $offer) }}">
                    {{ method_field('GET') }}
                    {{ csrf_field() }}
                    <input type="submit" value="Edit">
                </form>
                    <form method="post" action="{{ route('offers.destroy', $offer) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" value="Delete">
                    </form>
                @endauth


            </div>
        </div>
    </div>
@endsection
