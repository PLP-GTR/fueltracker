<?php

namespace App\Models;

use App\Models\FuelCategory;
use App\Models\FuelType;
use Illuminate\Database\Eloquent\Model;

class FuelCategoryFuelType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fuel_category_fuel_type';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Retrieve all fuel categories which belong to the fuel category fuel type
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuelCategories()
    {
        return $this->hasMany(FuelCategory::class);
    }

    /**
     * Retrieve all fuel types which belong to the fuel category fuel type
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuelTypes()
    {
        return $this->hasMany(FuelType::class);
    }
}
