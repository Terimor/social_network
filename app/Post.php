<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = [
        'profile'
    ];

    protected $fillable = [
        'content'
    ];

    public function profile() {
        return $this->belongsTo('App\Profile', 'profile_id', 'id');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function actions() {
        return $this->hasMany('App\Action');
    }
}
