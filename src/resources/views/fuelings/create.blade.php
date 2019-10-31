@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New fueling for {{ $vehicle->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('vehicles.show', $vehicle->id) }}">Back to {{ $vehicle->name }}</a> | 
                        <a href="{{ route('vehicles.index') }}">Back to your vehicles</a>
                    </p>

                    <p>Add new fueling to {{ $vehicle->make }} {{ $vehicle->model }}:</p>

                    {{ Form::open(['route' => ['vehicles.fuelings.store', $vehicle->id]]) }}

                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('refueled_at', 'Date of refueling') }}</div>
                            <div class="col-sm-8">{{ Form::date('refueled_at') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('utilization_overall', 'Car utilization overall (mileage / usage hours)') }}</div>
                            <div class="col-sm-8">{{ Form::number('utilization_overall', null, ['placeholder' => '2258']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('utilization_trip', 'Trip utilization (mileage / usage hours)') }}</div>
                            <div class="col-sm-8">{{ Form::checkbox('utilization_trip', null, ['placeholder' => '124.5', 'step' => '0.1']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('utilization_unit_id', 'Capacity') }}</div>
                            <div class="col-sm-8">{{ Form::number('utilization_unit_id', null, ['placeholder' => '42', 'step' => '0.1']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('currency_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('currency_id', App\Currency::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('costs', 'Costs') }}</div>
                            <div class="col-sm-8">{{ Form::number('costs', null, ['placeholder' => '68.89', 'step' => '0.01']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('costs_per_capacity', 'Costs per capacity (USD per gallon, euro per liter)') }}</div>
                            <div class="col-sm-8">{{ Form::number('costs_per_capacity', null, ['placeholder' => '4.599', 'step' => '0.001']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('fuel_type_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('fuel_type_id', App\FuelType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('payment_type_id', 'Payment Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('payment_type_id', App\PaymentType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('place_id', 'Place') }}</div>
                            <div class="col-sm-8">{{ Form::select('place_id', App\Place::all()->pluck('name','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('custom_fields', 'Custom fields') }}</div>
                            <div class="col-sm-8">{{ Form::textarea('custom_fields', null, ['placeholder' => "One:Value\nper:line"]) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::submit('Add fueling', array('class' => 'btn btn-primary float-right')) }}</div>
                            <div class="col-sm-8"></div>
                        </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection