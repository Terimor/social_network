<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamp = false;

    protected $fillable = [
        'user_id', 'community_id'
    ];
}
