<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\UtilizationUnit;
use App\CapacityUnit;
use App\ConsumptionUnit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $utilizationUnits = UtilizationUnit::all();
        $capacityUnits = CapacityUnit::all();
        $consumptionUnits = ConsumptionUnit::all();
        
        return view('vehicles.create', compact('utilizationUnits', 'capacityUnits', 'consumptionUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'is_active' => 'required',
            'name' => 'required',
            'description' => '',
            'utilization_unit_id' => 'required',
            'capacity_unit_id' => 'required',
            'consumption_unit_id' => 'required',
            'year' => '',
            'make' => '',
            'model' => '',
            'license_plate' => '',
            'vin' => '',
            'insurance' => '',
        );

        $validator = Validator::make(Input::all(), $rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::to('vehicles/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $vehicle = new Vehicle;
            $vehicle->user_id = Auth::id();
            $vehicle->is_active = Input::get('is_active');
            $vehicle->name = Input::get('name');
            $vehicle->description = Input::get('description');
            $vehicle->utilization_unit_id = Input::get('utilization_unit_id');
            $vehicle->capacity_unit_id = Input::get('capacity_unit_id');
            $vehicle->consumption_unit_id = Input::get('consumption_unit_id');
            $vehicle->year = Input::get('year');
            $vehicle->make = Input::get('make');
            $vehicle->model = Input::get('model');
            $vehicle->license_plate = Input::get('license_plate');
            $vehicle->vin = Input::get('vin');
            $vehicle->insurance = Input::get('insurance');
            $vehicle->save();

            // redirect
            Session::flash('message', 'Successfully created vehicle!');
            return Redirect::to('vehicles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
