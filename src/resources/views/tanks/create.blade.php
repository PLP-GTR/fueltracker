@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New vehicle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><a href="{{ route('vehicles.index') }}">Back to your vehicles</a></p>

                    <p><a href="{{ route('vehicles.show', $vehicle->id) }}">Back to {{ $vehicle->name }}</a></p>

                    <p>Add new tank to {{ $vehicle->make }} {{ $vehicle->model }}:</p>

                    {{ Form::open(['route' => ['vehicles.tanks.store', $vehicle->id]]) }}

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('is_active', 'Is active?') }}</div>
                            <div class="col-sm-8">{{ Form::checkbox('is_active', null, true) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('name', 'Name') }}</div>
                            <div class="col-sm-8">{{ Form::text('name', null, ['placeholder' => 'Plugin In-Hybrid Tank']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('default', 'Is default?') }}</div>
                            <div class="col-sm-8">{{ Form::checkbox('default', null, true) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('capacity', 'Capacity') }}</div>
                            <div class="col-sm-8">{{ Form::number('capacity', null, ['placeholder' => '42']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('fuel_type_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('fuel_type_id', App\FuelType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::submit('Add tank') }}</div>
                            <div class="col-sm-8"></div>
                        </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
