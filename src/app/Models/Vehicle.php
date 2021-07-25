<?php

namespace App\Models;

use App\Models\ConsumptionUnit;
use App\Models\CapacityUnit;
use App\Models\Concerns\UsesUuidTrait;
use App\Models\Fueling;
use App\Models\Tank;
use App\Models\User;
use App\Models\UtilizationUnit;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use UsesUuidTrait;

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
        return $this->hasMany(Fueling::class)->orderBy('refueled_at', 'desc');
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
