<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Posts extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'user',         // Pickup Post
        'progress',     // General 
        'editor',       // Become Editor
        'live',         // Add Live Link
        'folder',       // Add Google Drive Folder
        'priority',     // Archive Post
        'archived',      // Archive Post
        ]; 

    //Table Associated with the Model
    protected $table = 'posts';

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
