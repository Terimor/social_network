<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function user() {
        return $this->belongsTo('App\Profile', 'user_id', );
    }
}
