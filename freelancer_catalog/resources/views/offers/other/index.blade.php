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
                <h2>{{$users->user_id}}</h2>
                <br>
                <table class="table table-striped">

                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th>Deadline</th>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection
