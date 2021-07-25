<?php

namespace App\Models;

use App\Models\Concerns\UsesUuidTrait;
use Illuminate\Database\Eloquent\Model;

class UtilizationUnit extends Model
{
    use UsesUuidTrait;

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
