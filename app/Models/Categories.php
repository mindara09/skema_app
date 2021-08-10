<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{    
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'categories';
}
