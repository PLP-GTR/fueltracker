<?php

namespace App;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasUuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
