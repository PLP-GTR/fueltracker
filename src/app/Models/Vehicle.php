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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
     * Retrieve the fuelings which belong to the vehicle
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuelings()
    {
        return $this->hasMany(Fueling::class);
    }
    
    /**
     * Retrieve the utilization unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilizationUnit()
    {
        return $this->belongsTo(UtilizationUnit::class);
    }
    
    /**
     * Retrieve the capacity unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function capacityUnit()
    {
        return $this->belongsTo(CapacityUnit::class);
    }
    
    /**
     * Retrieve the consumption unit the vehicle belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consumptionUnit()
    {
        return $this->belongsTo(ConsumptionUnit::class);
    }
}
