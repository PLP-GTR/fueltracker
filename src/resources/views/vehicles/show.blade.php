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

                    <p><a href="{{ route('vehicles.index') }}">Back to your vehicles</a></p>
                    <p><a href="{{ route('vehicles.edit', $vehicle->id) }}">Edit this vehicle</a></p>
                    <p><a href="{{ route('vehicles.tanks.create', $vehicle->id) }}">Add a tank to this vehicle</a></p>

                    <p>Your vehicle:</p>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">id</th>
                                <td>{{ $vehicle->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">user</th>
                                <td>{{ $vehicle->user->name }} <i>({{ $vehicle->user->email }})</i></td>
                            </tr>
                            <tr>
                                <th scope="row">is_active</th>
                                <td>{{ $vehicle->is_active }}</td>
                            </tr>
                            <tr>
                                <th scope="row">name</th>
                                <td>{{ $vehicle->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">description</th>
                                <td>{{ $vehicle->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">utilizationUnit</th>
                                <td>{{ $vehicle->utilizationUnit->display_value }} <i>({{ $vehicle->utilizationUnit->description }})</i></td>
                            </tr>
                            <tr>
                                <th scope="row">capacityUnit</th>
                                <td>{{ $vehicle->capacityUnit->display_value }} <i>({{ $vehicle->capacityUnit->description }})</i></td>
                            </tr>
                            <tr>
                                <th scope="row">consumptionUnit</th>
                                <td>{{ $vehicle->consumptionUnit->display_value }} <i>({{ $vehicle->consumptionUnit->description }})</i></td>
                            </tr>
                            <tr>
                                <th scope="row">make</th>
                                <td>{{ $vehicle->make }}</td>
                            </tr>
                            <tr>
                                <th scope="row">model</th>
                                <td>{{ $vehicle->model }}</td>
                            </tr>
                            <tr>
                                <th scope="row">year</th>
                                <td>{{ $vehicle->year }}</td>
                            </tr>
                            <tr>
                                <th scope="row">license_plate</th>
                                <td>{{ $vehicle->license_plate }}</td>
                            </tr>
                            <tr>
                                <th scope="row">vin</th>
                                <td>{{ $vehicle->vin }}</td>
                            </tr>
                            <tr>
                                <th scope="row">insurance</th>
                                <td>{{ $vehicle->insurance }}</td>
                            </tr>
                            <tr>
                                <th scope="row">created_at</th>
                                <td>{{ $vehicle->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">updated_at</th>
                                <td>{{ $vehicle->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    {{ Form::model($vehicle, ['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) }}
                        {{ Form::submit('Delete this Vehicle', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
