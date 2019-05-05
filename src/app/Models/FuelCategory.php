<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelCategory extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
    /**
     * The fuel types that belong to the fuel category
     */
    public function fuelTypes()
    {
        return $this->belongsToMany(FuelType::class);
    }
}
