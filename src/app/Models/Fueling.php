<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fueling extends Model
{
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
}
