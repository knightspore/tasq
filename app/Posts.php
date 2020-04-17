<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
    protected $fillable = ['user', 'progress', '']; 

    //Table Associated with the Model
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo('App\User', 'user');
    }

}
