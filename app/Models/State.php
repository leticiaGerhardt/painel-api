<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class State
 * @package App\Models
 */
class State extends Model
{
    /**
     * @var string
     */
    public $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code',
    ];

    /**
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
