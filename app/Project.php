<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'site',
        'sop',
        'name',
        'clientname',
        'niche',
        'upload',
        'client',
        'logo',
        'comment',
        'email',
        ];

    protected $table = 'projects';

    public function task()
    {
        return $this->hasMany('App\Task', 'site', 'site');
    }
}
