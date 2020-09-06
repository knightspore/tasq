<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;

    protected $fillable = [
        'task',
        'user',
        'progress',
        'editor',
        'live',
        'site',
        'due',
        'completed',
        'type',
        'words',
        'project',
        'comment',
        'folder',
        'priority',
        'archived',
    ];

    //Table Associated with the Model
    protected $table = 'tasks';

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }

    public function edited()
    {
        return $this->hasOne('App\User', 'id', 'editor');
    }

    public function proj()
    {
        return $this->belongsTo('App\Project', 'site', 'site');
    }

    public function routeNotificationFor($driver)
    {
        return env('SLACK_HOOK');
    }

}
