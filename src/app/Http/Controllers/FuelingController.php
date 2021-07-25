<?php

namespace App\Http\Controllers;

use App\Models\Fueling;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FuelingController extends Controller
{

    /**
     * Validation rules for create and update
     * 
     * @var String
     */
    private $rules = array(
        'refueled_at'         => 'sometimes|date',
        'utilization_overall' => 'sometimes|nullable|numeric',
        'utilization_trip'    => 'sometimes|nullable|numeric',
        'utilization_unit_id' => 'sometimes|nullable|uuid',
        'costs'               => 'sometimes|nullable|numeric',
        'costs_per_capacity'  => 'sometimes|nullable|numeric',
        'currency_id'         => 'sometimes|nullable|exists:currencies,id',
        'fuel_type_id'        => 'sometimes|nullable|uuid',
        'payment_type_id'     => 'sometimes|nullable|uuid',
        'capacity_unit_id'    => 'sometimes|nullable|uuid',
        'place_id'            => 'sometimes|nullable|uuid',
        'custom_fields'       => 'sometimes|nullable',
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        return view('fuelings.index', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        return view('fuelings.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), $this->rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::route('vehicles.fuelings.create', $vehicle->id)
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $fueling = new Fueling;
            $fueling->vehicle_id          = $vehicle->id;
            $fueling->refueled_at         = $request->get('refueled_at');
            $fueling->costs               = $request->get('costs');
            $fueling->amount              = $request->get('amount');
            $fueling->costs_per_capacity  = $request->get('costs_per_capacity');
            $fueling->utilization_overall = $request->get('utilization_overall');
            $fueling->utilization_trip    = $request->get('utilization_trip');
            $fueling->utilization_unit_id = $request->get('utilization_unit_id');
            $fueling->currency_id         = $request->get('currency_id');
            $fueling->fuel_type_id        = $request->get('fuel_type_id');
            $fueling->payment_type_id     = $request->get('payment_type_id');
            $fueling->capacity_unit_id    = $request->get('capacity_unit_id');
            $fueling->place_id            = $request->get('place_id');
            $fueling->custom_fields       = $request->get('custom_fields');
            $fueling->save();

            // redirect
            Session::flash('message', 'Successfully created fueling!');
            return Redirect::route('vehicles.fuelings.index', $vehicle->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fueling  $fueling
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle, Fueling $fueling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fueling  $fueling
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle, Fueling $fueling)
    {
        return view('fuelings.edit', compact('vehicle', 'fueling'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fueling  $fueling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle, Fueling $fueling)
    {
        $validator = Validator::make($request->all(), $this->rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::route('vehicles.fuelings.edit', [$vehicle->id, $fueling->id])
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $fueling->refueled_at         = $request->get('refueled_at');
            $fueling->costs               = $request->get('costs');
            $fueling->amount              = $request->get('amount');
            $fueling->costs_per_capacity  = $request->get('costs_per_capacity');
            $fueling->utilization_overall = $request->get('utilization_overall');
            $fueling->utilization_trip    = $request->get('utilization_trip');
            $fueling->utilization_unit_id = $request->get('utilization_unit_id');
            $fueling->currency_id         = $request->get('currency_id');
            $fueling->fuel_type_id        = $request->get('fuel_type_id');
            $fueling->payment_type_id     = $request->get('payment_type_id');
            $fueling->capacity_unit_id    = $request->get('capacity_unit_id');
            $fueling->place_id            = $request->get('place_id');
            $fueling->custom_fields       = $request->get('custom_fields');
            $fueling->save();

            // redirect
            Session::flash('message', 'Successfully updated fueling!');
            return Redirect::route('vehicles.fuelings.index', $vehicle->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fueling  $fueling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fueling $fueling)
    {
        //
    }
}
