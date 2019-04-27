<?php

namespace App;

use App\ConsumptionUnit;
use App\FuelUnit;
use App\Tank;
use App\User;
use App\UtilizationUnit;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    
    /**
     * Retrieve the user the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Retrieve the tanks which belong to the vehicle
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanks()
    {
        return $this->hasMany(Tanks::class);
    }
    
    /**
     * Retrieve the utilization unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function utilizationUnit()
    {
        return $this->hasOne(UtilizationUnit::class);
    }
    
    /**
     * Retrieve the fuel unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuelUnit()
    {
        return $this->hasOne(FuelUnit::class);
    }
    
    /**
     * Retrieve the consumption unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consumptionUnit()
    {
        return $this->hasOne(ConsumptionUnit::class);
    }
}
