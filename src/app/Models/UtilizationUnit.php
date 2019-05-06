<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilizationUnit extends Model
{
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
        return $this->description . ' (' . $this->display_value . ')';
    }
}
