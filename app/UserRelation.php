<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    public $timestamps = false;

    public function target() {
        return $this->belongsTo('users', 'target', 'id');
    }

    public function actor() {
        return $this->belongsTo('users', 'actor', 'id');
    }

    protected $fillable = [
        'actor', 'target', 'action'
    ];

    public static function checkRelation($actor, $target, $action) {
        return self::where([
            'actor' => $actor,
            'target' => $target,
            'action' => $action
        ])->count();
    }

    public static function getSubscribersAmount($user_id) {
        return self::where([
            'target' => $user_id,
            'action' => 'subscribe'
        ])->count();
    }
}
