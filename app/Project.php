<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Project
 *
 * Model to describe Projects
 *
 * @package App
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short_code',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'id', 'name', 'short_code'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public static function create(array $attributes = [])
    {
        if (empty($attributes['short_code'])) {
            // TODO Check for existing code...
            $attributes['short_code'] = strtoupper(substr($attributes['name'], 0, 3));
        }

        return parent::create($attributes);
    }
}
