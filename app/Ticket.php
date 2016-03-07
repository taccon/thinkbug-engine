<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Ticket
 *
 * Model for Ticket
 *
 * @package App
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    /** @var string $title */
    public $title;

    /** @var string $description */
    public $description;

    /** @var string $status */
    public $status;
}
