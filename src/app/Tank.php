<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    
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
