<?php

namespace App\Models;

use App\Models\Concerns\UsesUuidTrait;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use UsesUuidTrait;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
