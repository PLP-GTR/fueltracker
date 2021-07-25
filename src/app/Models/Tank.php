<?php

namespace App;

use App\Models\CapacityUnit;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    use HasUuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Retrieve the vehicle the tank belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
    
    /**
     * Retrieve the capacity unit the tank belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function capacityUnit()
    {
        return $this->belongsTo(CapacityUnit::class);
    }
    
    /**
     * Retrieve the fuel unit the tank belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }
}
