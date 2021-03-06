@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('vehicles.index') }}">Vehicles</a> ⮞ 
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->name }}</a>,
                    <strong>{{ $vehicle->make }}</strong> {{ $vehicle->model }} ⮞ Update
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'put']) }}

                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('is_active', 'Is active?') }}</div>
                        <div class="col-sm-8">{{ Form::checkbox('is_active') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('name', 'Name') }}</div>
                        <div class="col-sm-8">{{ Form::text('name') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('description', 'Description') }}</div>
                        <div class="col-sm-8">{{ Form::text('description') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('utilization_unit_id', 'Utilization Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('utilization_unit_id', App\UtilizationUnit::all()->pluck('human_readable','id')) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id')) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('consumption_unit_id', 'Consumption Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('consumption_unit_id', App\ConsumptionUnit::all()->pluck('human_readable','id')) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('year', 'Year') }}</div>
                        <div class="col-sm-8">{{ Form::text('year') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('make', 'Make') }}</div>
                        <div class="col-sm-8">{{ Form::text('make') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('model', 'Model') }}</div>
                        <div class="col-sm-8">{{ Form::text('model') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('license_plate', 'License Plate') }}</div>
                        <div class="col-sm-8">{{ Form::text('license_plate') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('vin', 'VIN') }}</div>
                        <div class="col-sm-8">{{ Form::text('vin') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('insurance', 'Insurance') }}</div>
                        <div class="col-sm-8">{{ Form::text('insurance') }}</div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-3">{{ Form::submit('Update vehicle', array('class' => 'btn btn-primary float-left')) }}</div>
                        <div class="col-sm-9"><a class="btn btn-link text-secondary" href="{{ route('vehicles.show', $vehicle->id) }}">Cancel edit</a></div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
