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
}
