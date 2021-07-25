<?php

namespace App\Models;

use App\Models\Currency;
use App\Models\CapacityUnit;
use App\Models\FuelCategory;
use App\Models\FuelType;
use App\Models\Concerns\UsesUuidTrait;
use App\Models\PaymentType;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Fueling extends Model
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
     * The fuel categories that belong to the fuel type
     */
    public function fuelCategories()
    {
        return $this->belongsToMany(FuelCategory::class);
    }
    
    /**
     * Retrieve the vehicle the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    
    /**
     * Retrieve the utilization unit the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilizationUnit()
    {
        return $this->belongsTo(UtilizationUnit::class);
    }
    
    /**
     * Retrieve the currency the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    
    /**
     * Retrieve the fuel type the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }
    
    /**
     * Retrieve the payment type the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
    
    /**
     * Retrieve the capacity unit the fueling belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function capacityUnit()
    {
        return $this->belongsTo(CapacityUnit::class);
    }
}
