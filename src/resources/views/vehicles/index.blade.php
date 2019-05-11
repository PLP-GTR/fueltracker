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
                    
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a>
                            </div>
                            <div class="col-sm-8">
                                {{ $vehicle->year }} {{ $vehicle->make }} <b>{{ $vehicle->model }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <a href="{{ route('vehicles.fuelings.index', $vehicle->id) }}">Fuelings</a> (<a href="{{ route('vehicles.fuelings.create', $vehicle->id) }}">Add</a>)
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
