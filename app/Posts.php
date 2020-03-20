<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //Table Associated with the Model
    protected $table = 'posts';
    
    //Format Dates
    protected $dateFormat = 'U';

}
