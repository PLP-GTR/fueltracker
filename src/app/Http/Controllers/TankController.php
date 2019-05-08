<?php

namespace App\Http\Controllers;

use App\Tank;
use Illuminate\Http\Request;
use App\FuelType;
use App\CapacityUnit;
use App\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TankController extends Controller
{

    /**
     * Validation rules for create and update
     * 
     * @var String
     */
    private $rules = array(
        'name'                => 'required',
        'is_active'           => 'sometimes',
        'default'             => 'sometimes',
        'capacity'            => 'required|numeric',
        'capacity_unit_id' => 'required|uuid',
        'fuel_type_id'        => 'required|uuid',
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vehicleId)
    {
        $vehicle       = Vehicle::find($vehicleId);
        $capacityUnits = CapacityUnit::all();
        $fuelTypes     = FuelType::all();

        return view('tanks.create', compact('vehicle', 'capacityUnits', 'fuelTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vehicleId)
    {
        $validator = Validator::make($request->all(), $this->rules);

        // Validate
        if ($validator->fails()) {
            return Redirect::route('vehicles.tanks.create', $vehicleId)
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $tank = new Tank;
            $tank->vehicle_id = $vehicleId;
            $tank->name = $request->get('name');
            $tank->is_active = $request->get('is_active', 1);
            $tank->default = $request->get('default', 1);
            $tank->capacity = $request->get('capacity');
            $tank->capacity_unit_id = $request->get('capacity_unit_id');
            $tank->fuel_type_id = $request->get('fuel_type_id');
            $tank->save();

            // redirect
            Session::flash('message', 'Successfully created tank!');
            return Redirect::route('vehicles.show', $vehicleId);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function show(Tank $tank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function edit(Tank $tank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tank $tank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tank $tank)
    {
        //
    }
}
