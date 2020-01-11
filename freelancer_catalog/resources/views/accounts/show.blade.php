@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>My name is {{$account->name}}</h2>
                <h4>Rate: {{$account->rate}}</h4>

                <h2>My Offers:</h2>

                <strong>{{$account->title}}</strong><br>
                <strong>{{$account->description}}</strong><br>
                salary: <strong>{{$account->maxSalary}}</strong><br>
                deadline: <strong>{{$account->deadline}}</strong>






            </div>
        </div>
    </div>
@endsection
