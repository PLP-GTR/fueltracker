<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasUuid;

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
