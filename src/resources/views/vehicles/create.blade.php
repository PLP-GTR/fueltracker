@extends('layouts.app')

@section('content')
<div class="container-fluid">
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

                    <p>Add new vehicle:</p>

                    <form method="POST" action="/vehicles">
                        {{ csrf_field() }}

                        <div class="row">
                        <div class="col-sm-4">{{ Form::label('is_active', 'Is active?') }}</div>
                        <div class="col-sm-8">{{ Form::checkbox('is_active', null, true) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('name', 'Name') }}</div>
                        <div class="col-sm-8">{{ Form::text('name', null, ['placeholder' => 'Green one']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('description', 'Description') }}</div>
                        <div class="col-sm-8">{{ Form::text('description', null, ['placeholder' => 'About the car']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('utilization_unit_id', 'Utilization Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('utilization_unit_id', App\UtilizationUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('capacity_unit_id', 'Capacity Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('capacity_unit_id', App\CapacityUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('consumption_unit_id', 'Consumption Unit') }}</div>
                        <div class="col-sm-8">{{ Form::select('consumption_unit_id', App\ConsumptionUnit::all()->pluck('human_readable','id'), null, ['placeholder' => 'Choose...']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('year', 'Year') }}</div>
                        <div class="col-sm-8">{{ Form::text('year', null, ['placeholder' => '2001']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('make', 'Make') }}</div>
                        <div class="col-sm-8">{{ Form::text('make', null, ['placeholder' => 'Audi']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('model', 'Model') }}</div>
                        <div class="col-sm-8">{{ Form::text('model', null, ['placeholder' => 'A4 B5 1.8T quattro Avant']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('license_plate', 'License Plate') }}</div>
                        <div class="col-sm-8">{{ Form::text('license_plate', null, ['placeholder' => 'MYA4ROXs']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('vin', 'VIN') }}</div>
                        <div class="col-sm-8">{{ Form::text('vin', null, ['placeholder' => 'WAUZZZ8DZ123456']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::label('insurance', 'Insurance') }}</div>
                        <div class="col-sm-8">{{ Form::text('insurance', null, ['placeholder' => 'HUK24 fully comprehensive']) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">{{ Form::submit('Create vehicle') }}</div>
                        <div class="col-sm-8"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
