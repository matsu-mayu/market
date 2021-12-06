<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'name', 'description', 'price', 'category_id', 'shape_id', 'rim_id', 'gender_id', 'size_id', 'image'
    ];
}
