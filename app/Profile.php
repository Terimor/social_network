<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'bio', 'avatar', 'user_id'
    ];

    protected $attributes = [
        'avatar' => 'https://avatarfiles.alphacoders.com/174/thumb-174752.jpg'
    ];

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function actions() {
        return $this->hasMany('App\Action');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id' ,'id');
    }
}
