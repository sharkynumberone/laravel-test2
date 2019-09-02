<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LogRecord
 * @package App\Models
 */
class LogRecord extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'user_id',
        'event_type',
        'event_url',
        'data'
    ];
}
