@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('vehicles.index') }}">Vehicles</a> ⮞ 
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a>,
                    <strong>{{ $vehicle->make }}</strong> {{ $vehicle->model }} ⮞ 
                    Fueling: {{ $fueling->refueled_at }} ⮞ Update
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($fueling, ['route' => ['vehicles.fuelings.update', $vehicle->id, $fueling->id], 'method' => 'put']) }}

                        <div class="row align-items-center">
                            <div class="col-sm-4">{{ Form::label('refueled_at', 'Date of refueling') }}</div>
                            <div class="col-sm-8">{{ Form::date('refueled_at', \Carbon\Carbon::now(), ['class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('amount', 'Amount') }}</div>
                            <div class="col-sm-8">{{ Form::number('amount', null, ['placeholder' => '00.00', 'step' => '0.01', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('fuel_type_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('fuel_type_id', App\FuelType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('tank_id', 'Tank') }}</div>
                            <div class="col-sm-8">{{ Form::select('tank_id', $vehicle->tanks->pluck('name','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-4">{{ Form::label('currency_id', 'Currency') }}</div>
                            <div class="col-sm-8">{{ Form::select('currency_id', App\Currency::all()->pluck('display_value','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('costs', 'Costs') }}</div>
                            <div class="col-sm-8">{{ Form::number('costs', null, ['placeholder' => '00.00', 'step' => '0.01', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4"><p>{{ Form::label('costs_per_capacity', 'Costs per capacity') }}<br/><i>i.e. USD per gallon, euro per liter</i></p></div>
                            <div class="col-sm-8">{{ Form::number('costs_per_capacity', null, ['placeholder' => '0.000', 'step' => '0.001', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('payment_type_id', 'Payment Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('payment_type_id', App\PaymentType::all()->pluck('display_value','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-4"><p>{{ Form::label('utilization_overall', 'Car utilization overall') }}<br/><i>Milage or usage hours</i></p></div>
                            <div class="col-sm-8">{{ Form::number('utilization_overall', null, ['placeholder' => '123456', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4"><p>{{ Form::label('utilization_trip', 'Trip utilization') }}<br/><i>Milage or usage hours</i></p></div>
                            <div class="col-sm-8">{{ Form::number('utilization_trip', null, ['placeholder' => '000.0', 'step' => '0.1', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('utilization_unit_id', 'Utilization unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('utilization_unit_id', App\UtilizationUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-4">{{ Form::label('place_id', 'Place') }}</div>
                            <div class="col-sm-8">{{ Form::select('place_id', App\Place::all()->pluck('name','id'), null, ['placeholder' => 'Choose...', 'class' => 'form-control']) }}</div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-sm-4">{{ Form::label('custom_fields', 'Custom fields') }}</div>
                            <div class="col-sm-8">{{ Form::textarea('custom_fields', null, ['placeholder' => "One:Value\nper:line", 'class' => 'form-control']) }}</div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-sm-3">{{ Form::submit('Update fueling', array('class' => 'btn btn-primary float-left')) }}</div>
                            <div class="col-sm-9"><a class="btn btn-link text-secondary" href="{{ route('vehicles.fuelings.index', $vehicle->id) }}">Cancel edit</a></div>
                        </div>

                    {{ Form::close() }}

                    @if ($errors->any())
                        <div class="row mt-3">
                            <div class="col text-danger">Please check your input:</div>
                        </div>
                        @foreach ($errors->all() as $error)
                            <div class="row"><div class="col">{{$error}}</div></div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
