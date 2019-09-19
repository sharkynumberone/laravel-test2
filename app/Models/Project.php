<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App\Models
 */
class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'key',
    ];

    /**
     * Logs
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs() {
        return $this->hasMany('App\Models\ProjectEventLog');
    }
}
