<?php

namespace App;

use App\ConsumptionUnit;
use App\CapacityUnit;
use App\Tank;
use App\User;
use App\UtilizationUnit;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasUuid;

class Vehicle extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
        return $this->hasMany(Tank::class);
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
    public function capacityUnit()
    {
        return $this->hasOne(CapacityUnit::class);
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
