<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'name', 'description', 'price', 'category_id', 'shape_id', 'image'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function likes() {
        return $this->hasMany('App\Like');
    }
    
    public function likedUsers() {
        return $this->belongsToMany('App\User', 'likes');
    }
    
    public function isLikedBy($user) {
        $liked_users_ids = $this->likedUsers->pluck('id');
        $result = $liked_users_ids->contains($user->id);
        return $result;
    }
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
    
    public function shape() {
        return $this->belongsTo('App\Shape');
    }
    
    public function orders() {
        return $this->hasMany('App\Order');
    }
    
    public function isSold() {
        return $this->orders()->count() >= 1;
    }
}
