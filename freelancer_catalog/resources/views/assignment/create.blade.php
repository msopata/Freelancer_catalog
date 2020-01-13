@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Put your offer:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                Deadline: <input type="date" name="deadline" value="{{ $offer->deadline }}">
                <br>
                Salary: <input type="text" name="maxSalary" value="{{ $offer->maxSalary }}">
                <br>

            </div>
        </div>
    </div>
@endsection
