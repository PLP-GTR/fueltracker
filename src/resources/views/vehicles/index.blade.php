@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Vehicles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><a href="/vehicles/create">Add new vehicle</a></p>

                    <p>Your vehicles:</p>

                    @foreach ($vehicles as $vehicle)
                        <li>{{ $vehicle->year }} {{ $vehicle->make }} <b>{{ $vehicle->model }}</b></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
