<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

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

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'site', 'id');
    }
}
