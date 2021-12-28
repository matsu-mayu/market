<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'profile', 'image', 'category_id', 'shape_id', 'rim_id', 'gender_id', 'size_id', 'color_id', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function items() {
        return $this->hasMany('App\Item');
    }
    
    public function likes() {
        return $this->hasMany('App\Like');
    }
    
    public function likeItems() {
        return $this->belongsToMany('App\Item', 'likes')->withPivot('created_at AS liked_at')->orderBy('liked_at', 'desc');
    }
    
    public function orders() {
        return $this->hasMany('App\Order');
    }
}
