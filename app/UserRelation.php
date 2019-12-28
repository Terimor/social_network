<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    public $timestamp = false;

    protected $fillable = [
        'actor', 'target', 'action'
    ]
}
