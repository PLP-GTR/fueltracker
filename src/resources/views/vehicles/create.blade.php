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

                    <p>Add new vehicle:</p>

                    <form method="POST" action="/vehicles">
                        {{ csrf_field() }}

                        <div>
                            Is active? <input type="checkbox" name="is_active" />
                        </div>
                        <div>
                            Name<br />
                            <input type="text" name="name" placeholder="Green one" />
                        </div>
                        <div>
                            Description<br />
                            <textarea name="description" placeholder="About the car"></textarea>
                        </div>
                        <div>
                            Utilization Unit<br />
                            <select name="utilization_unit_id">
                                @foreach ($utilizationUnits as $utilizationUnit)
                                    <option value="{{ $utilizationUnit->id }}">{{ $utilizationUnit->description }} ({{ $utilizationUnit->display_value }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            Capacity Unit<br />
                            <select name="capacity_unit_id">
                                @foreach ($capacityUnits as $capacityUnit)
                                    <option value="{{ $capacityUnit->id }}">{{ $capacityUnit->description }} ({{ $capacityUnit->display_value }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            Consumption Unit<br />
                            <select name="consumption_unit_id">
                                @foreach ($consumptionUnits as $consumptionUnit)
                                    <option value="{{ $consumptionUnit->id }}">{{ $consumptionUnit->description }} ({{ $consumptionUnit->display_value }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            Year<br />
                            <input type="text" name="year" placeholder="2001" />
                        </div>
                        <div>
                            Make<br />
                            <input type="text" name="make" placeholder="Audi" />
                        </div>
                        <div>
                            Model<br />
                            <input type="text" name="model" placeholder="A4 B5 1.8T quattro Avant" />
                        </div>
                        <div>
                            License Plate<br />
                            <input type="text" name="license_plate" placeholder="MYA4ROX" />
                        </div>
                        <div>
                            VIN<br />
                            <input type="text" name="vin" placeholder="WAUZZZ8K6AA103083" />
                        </div>
                        <div>
                            Insurance<br />
                            <input type="text" name="insurance" placeholder="HUK24 fully comprehensive insurance" />
                        </div>
                        <div>
                            <button type="submit">Create vehicle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
