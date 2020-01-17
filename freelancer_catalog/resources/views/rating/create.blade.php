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
                <h3>Your Rate</h3>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('rating.store') }}">
                    {{ csrf_field() }}
                    Lead time: <input type="integer" name="lead_time" value="{{ old("lead_time") }}">
                    <br>
                    Quality: <input type="integer" name="quality" value="{{ old("quality") }}">
                    <br>
                    Final result: <input type="integer" name="final_result" value="{{ old("final_result") }}">
                    <br>
                    Additional information <input type="text" name="additional_information" value="{{ old("additional_information") }}">
                    <br>
                    <input type="submit" value="Put your rate">
                </form>
            </div>
        </div>
    </div>

@endsection
