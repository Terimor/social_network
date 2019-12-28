<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    public $timestamp = false;

    public function target() {
        return $this->belongsTo('users', 'target', 'id');
    }

    public function actor() {
        return $this->belongsTo('users', 'actor', 'id');
    }

    protected $fillable = [
        'actor', 'target', 'action'
    ];
}
