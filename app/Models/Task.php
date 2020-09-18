<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

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
        return $this->hasOne('App\Models\User', 'id', 'user');
    }

    public function edited()
    {
        return $this->hasOne('App\Models\User', 'id', 'editor');
    }

    public function proj()
    {
        return $this->hasOne('App\Models\Project', 'id', 'site');
    }
}
