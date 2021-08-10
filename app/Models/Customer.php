<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'customers';
}
