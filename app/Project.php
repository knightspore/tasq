<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function task()
    {
        return $this->hasMany('App\Posts', 'site', 'site');
    }
}
