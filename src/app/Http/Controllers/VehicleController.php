<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\UtilizationUnit;
use App\Models\CapacityUnit;
use App\Models\ConsumptionUnit;
use App\Models\Tank;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{

    /**
     * Validation rules for create and update
     * 
     * @var String
     */
    private $rules = array(
        'is_active'           => 'sometimes',
        'name'                => 'required',
        'description'         => 'sometimes',
        'utilization_unit_id' => 'required|uuid',
        'capacity_unit_id'    => 'required|uuid',
        'consumption_unit_id' => 'required|uuid',
        'year'                => 'sometimes',
        'make'                => 'sometimes',
        'model'               => 'sometimes',
        'license_plate'       => 'sometimes',
        'vin'                 => 'sometimes',
        'insurance'           => 'sometimes',
    );

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
        $capacityUnits    = CapacityUnit::all();
        $consumptionUnits = ConsumptionUnit::all();
        $utilizationUnits = UtilizationUnit::all();
        
        return view('vehicles.create', compact('capacityUnits', 'consumptionUnits', 'utilizationUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::route('vehicles.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $vehicle = new Vehicle;
            $vehicle->user_id = Auth::id();
            $vehicle->is_active = $request->get('is_active', 0);
            $vehicle->name = $request->get('name');
            $vehicle->description = $request->get('description');
            $vehicle->utilization_unit_id = $request->get('utilization_unit_id');
            $vehicle->capacity_unit_id = $request->get('capacity_unit_id');
            $vehicle->consumption_unit_id = $request->get('consumption_unit_id');
            $vehicle->year = $request->get('year');
            $vehicle->make = $request->get('make');
            $vehicle->model = $request->get('model');
            $vehicle->license_plate = $request->get('license_plate');
            $vehicle->vin = $request->get('vin');
            $vehicle->insurance = $request->get('insurance');
            $vehicle->save();

            // Create default tank for vehicle to start with
            $tank = new Tank();
            $tank->vehicle_id = $vehicle->id;
            $tank->name = 'Default'; // TODO: Generate human readable translated string
            $tank->is_active = true;
            $tank->default = true;
            $tank->save();
            
            // redirect
            Session::flash('message', 'Successfully created vehicle!');
            return Redirect::route('vehicles.index');
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
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $capacityUnits    = CapacityUnit::all();
        $consumptionUnits = ConsumptionUnit::all();
        $utilizationUnits = UtilizationUnit::all();

        return view('vehicles.edit', compact('vehicle', 'capacityUnits', 'consumptionUnits', 'utilizationUnits'));
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
        $validator = Validator::make($request->all(), $this->rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::route('vehicles.edit', $vehicle->id)->withErrors($validator)->withInput($request->all());
        } else {
            $vehicle->is_active = $request->get('is_active', 0);
            $vehicle->name = $request->get('name');
            $vehicle->description = $request->get('description');
            $vehicle->utilization_unit_id = $request->get('utilization_unit_id');
            $vehicle->capacity_unit_id = $request->get('capacity_unit_id');
            $vehicle->consumption_unit_id = $request->get('consumption_unit_id');
            $vehicle->year = $request->get('year');
            $vehicle->make = $request->get('make');
            $vehicle->model = $request->get('model');
            $vehicle->license_plate = $request->get('license_plate');
            $vehicle->vin = $request->get('vin');
            $vehicle->insurance = $request->get('insurance');
            $vehicle->save();

            // redirect
            Session::flash('message', 'Successfully updated vehicle!');
            return Redirect::route('vehicles.show', $vehicle->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the vehicle');
        return Redirect::to('vehicles');
    }
}
