<?php

namespace App;

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
}
