<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
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

    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'local_key');
    }

}
