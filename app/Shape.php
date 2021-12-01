<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'name', 'description', 'price', 'category_id', 'shape_id', 'image'
    ];
}
