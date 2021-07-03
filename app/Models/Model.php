<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Model
 * @package App\Models
 */
class Model extends EloquentModel
{
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = false;
}
