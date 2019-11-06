<?php

namespace App;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasUuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Generates an human readable value from other attributes
     * 
     * @return String
     */
    public function getHumanReadableAttribute() {
        //return $this->description . ' (' . $this->display_value . ')';
        return $this->display_value . ' --- ' . $this->description;
    }
}
