<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'products';

    protected $casts = [
        'category_id' => 'integer',
        'price' => 'integer',
        'percent' => 'integer'
    ];
}
