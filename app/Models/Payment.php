<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'payments';
}
