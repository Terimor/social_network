<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content'
    ];

    public function user() {
        return $this->belongsTo('App\Profile', 'user_id', 'id');
    }

    public function post() {
        return $this->belongsTo('App\Profile', 'post_id', 'id');
    }
}
