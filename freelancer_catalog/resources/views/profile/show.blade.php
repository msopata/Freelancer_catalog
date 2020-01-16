@extends('layouts.app')

@section('content')
    <style>
        .container{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .col-md-8{
            flex: 1;
        }

    </style>
    <div class="container">
        <div class="col-md-8">
            <div class="panel-body">
                <br>
                <h3>{{$name}}</h3>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th>Deadline</th>
                        <th></th>
                    </tr>
                    @foreach( $offers as $offer )
                        <tr>
                            <th> <a href="{{ route('offers.show', $offer) }}">{{$offer->title}}</a></th>
                            <th>{{$offer->description}}</th>
                            <th>{{$offer->maxSalary}}</th>
                            <th>{{$offer->deadline}}</th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
