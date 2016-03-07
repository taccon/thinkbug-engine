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
        'name',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'id', 'name',
    ];

    /** @var string $name */
    public $name;

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
