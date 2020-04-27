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
        'accountmgr',
        'upload',
        'client',
        'logo',
        'asana_id',
        'comment',
        'email',
        ]; 

    protected $table = 'projects';

    public function task()
    {
        return $this->hasMany('App\Posts', 'site', 'site');
    }
}
