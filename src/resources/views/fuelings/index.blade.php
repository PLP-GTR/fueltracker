@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fuelings of {{ $vehicle->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center mb-2">
                        <div class="col-sm-4">Refueled at</div>
                        <div class="col-sm-2">Costs</div>
                        <div class="col-sm-2">Amount</div>
                        <div class="col-sm-3">Fuel</div>
                        <div class="col-sm-1"></div>
                    </div>

                    @foreach ($vehicle->fuelings as $fueling)
                    
                        <div class="row">
                            <div class="col-sm-4">
                                {{ $fueling->refueled_at }}
                            </div>
                            <div class="col-sm-2">
                                {{ $fueling->costs }} {{$fueling->currency->code ?? ''}}
                            </div>
                            <div class="col-sm-2">
                                {{ $fueling->amount }} {{$fueling->capacityUnit->abbreviation ?? ''}}
                            </div>
                            <div class="col-sm-3">
                                {{$fueling->fuelType->display_value ?? ''}}
                            </div>
                            <div class="col-sm-1">
                                <a href="{{ route('vehicles.fuelings.edit', [$vehicle->id, $fueling->id]) }}">edit</a>
                            </div>
                        </div>
                    @endforeach

                    <p class="mt-5"><a href="{{ route('vehicles.fuelings.create', $vehicle->id) }}">Add new fueling</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
