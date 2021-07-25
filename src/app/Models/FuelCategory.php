<?php

namespace App\Models;

use App\Models\FuelType;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class FuelCategory extends Model
{
    use HasUuid;

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
