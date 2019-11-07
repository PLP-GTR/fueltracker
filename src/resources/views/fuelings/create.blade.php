@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('vehicles.index') }}">Vehicles</a> ⮞ 
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a>,
                    <strong>{{ $vehicle->make }}</strong> {{ $vehicle->model }} ⮞ 
                    Add fueling
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="h5 mb-4">New fueling</p>
                    
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif

                    {{ Form::open(['route' => ['vehicles.fuelings.store', $vehicle->id]]) }}

                        <div class="row align-items-center">
                            <div class="col-sm-4">{{ Form::label('refueled_at', 'Date of refueling') }}</div>
                            <div class="col-sm-8">{{ Form::date('refueled_at', \Carbon\Carbon::now(), ['class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('currency_id', 'Currency') }}</div>
                            <div class="col-sm-8">{{ Form::select('currency_id', App\Currency::all()->pluck('display_value','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('costs', 'Costs') }}</div>
                            <div class="col-sm-8">{{ Form::number('costs', null, ['placeholder' => '68.89', 'step' => '0.01', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('amount', 'Amount') }}</div>
                            <div class="col-sm-8">{{ Form::number('amount', null, ['placeholder' => '55.67', 'step' => '0.01', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('costs_per_capacity', 'Costs per capacity') }}<br/><i>i.e. USD per gallon, euro per liter</i></div>
                            <div class="col-sm-8">{{ Form::number('costs_per_capacity', null, ['placeholder' => '4.599', 'step' => '0.001', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('utilization_overall', 'Car utilization overall') }}<br/><i>Milage or usage hours</i></div>
                            <div class="col-sm-8">{{ Form::number('utilization_overall', null, ['placeholder' => '2258', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('utilization_trip', 'Trip utilization') }}<br/><i>Milage or usage hours</i></div>
                            <div class="col-sm-8">{{ Form::number('utilization_trip', null, ['placeholder' => '124.5', 'step' => '0.1', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('utilization_unit_id', 'Utilization unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('utilization_unit_id', App\UtilizationUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('fuel_type_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('fuel_type_id', App\FuelType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('payment_type_id', 'Payment Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('payment_type_id', App\PaymentType::all()->pluck('display_value','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('place_id', 'Place') }}</div>
                            <div class="col-sm-8">{{ Form::select('place_id', App\Place::all()->pluck('name','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('custom_fields', 'Custom fields') }}</div>
                            <div class="col-sm-8">{{ Form::textarea('custom_fields', null, ['placeholder' => "One:Value\nper:line", 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
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
