@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $vehicle->name }}, update the tank: {{ $tank->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($tank, ['route' => ['vehicles.tanks.update', $vehicle->id, $tank->id], 'method' => 'put']) }}

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
                            <div class="col-sm-8">{{ Form::number('capacity', null, ['placeholder' => '42', 'step' => '0.1']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                            <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">{{ Form::label('fuel_type_id', 'Fuel Type') }}</div>
                            <div class="col-sm-8">{{ Form::select('fuel_type_id', App\FuelType::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-sm-3">{{ Form::submit('Update tank', array('class' => 'btn btn-primary float-left')) }}</div>
                            <div class="col-sm-9"><a class="btn btn-link text-secondary" href="{{ route('vehicles.show', $vehicle->id) }}">Cancel edit</a></div>
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
