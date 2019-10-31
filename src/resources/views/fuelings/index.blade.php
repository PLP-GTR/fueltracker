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

                    <p><a href="{{ route('vehicles.fuelings.create', $vehicle->id) }}">Add new fueling</a></p>

                    <p>Fuelings:</p>

                    @foreach ($vehicle->fuelings as $fueling)
                    
                        <div class="row">
                            <div class="col-sm-4">
                                {{ $fueling->refueled_at }}
                            </div>
                            <div class="col-sm-8">
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
