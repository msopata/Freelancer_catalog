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
                <h3>{{$users->name}}</h3>
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
                            <th><a href="{{ route('offers.assignments.create', $offer) }}" class="btn btn-primary">Assign</a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel-body"><br>
                <h3>Ratings</h3>
                <br>
                <a href="{{route("rating.create")}}" class="btn btn-primary">Add new rate +</a>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th></th>
                        <th>Rating user</th>
                        <th>Lead time</th>
                        <th>Quality</th>
                        <th>Final result</th>
                        <th>Additional information</th>
                    </tr>
                    @foreach( $ratings as $rating )
                        <tr>
                            <th></th><!--name user-->
                            <th></th><!--rating user-->
                            <th>{{$rating->lead_time}}</th>
                            <th>{{$rating->quality}}</th>
                            <th>{{$rating->final_result}}</th>
                            <th>{{$rating->additional_information}}</th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
