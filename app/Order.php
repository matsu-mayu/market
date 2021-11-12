<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'name', 'description', 'price', 'category_id', 'image'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function item() {
        return $this->belongsTo('App\Item');
    }
}
