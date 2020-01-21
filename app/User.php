<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $with = [
        'profile'
    ];

    public function profile() {
        return $this->hasOne('App\Profile', 'user_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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

    public function subscribes($only_ids = false) {
        $subscribes = UserRelation::where('actor', $this->id)->pluck('target')->all();
        $query = self::whereIn('id', $subscribes);
        if($only_ids) {
            return $query->pluck('id')->all();
        }
        return $query->get();
    }
}
