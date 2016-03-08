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

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'ticket_number',
        'project_id',
        'author_email',
        'assignee_email',
        'type',
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $appends = ['author_email', 'assignee_email'];

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function assignee()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function getTicketNumberAttribute($value)
    {
        $project = $this->project;

        return sprintf('%s-%d', $project->short_code, $value);
    }

    public function getAuthorEmailAttribute()
    {
        return $this->attributes['author_email'] = $this->author->email;
    }

    public function getAssigneeEmailAttribute()
    {
        return $this->attributes['assignee_email'] = $this->assignee->email;
    }
}
