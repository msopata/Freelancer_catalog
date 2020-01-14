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
                <div>Offer id: </div>
                <form method="post" action="{{ route('assignments.store') }}">
                    {{ csrf_field() }}
                    Estimated deadline: <input type="date" name="expected_deadline" value="{{ old("expected_deadline") }}">
                    <br>
                    Expected salary: <input type="text" name="expected_salary" value="{{ old("expected_salary") }}">
                    <br>
                    Additional information <input type="text" name="additional_information" value="{{ old("additional_information") }}">
                    <br>
                    <input type="submit" value="Create assignment">
                </form>

            </div>
        </div>
    </div>
@endsection
