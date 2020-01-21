<?php

namespace App\Http\Controllers;

use App\UserRelation;
use Illuminate\Http\Request;

class UserRelationController extends Controller
{
    public function subscribe(Request $request, $user_id) {
        UserRelation::firstOrCreate([
            'actor' => $this->user->id,
            'target' => $user_id,
            'action' => 'subscribe'
        ]);
        return redirect()->back();
    }

    public function unfollow(Request $request, $user_id) {
        UserRelation::where([
            'actor' => $this->user->id,
            'target' => $user_id,
            'action' => 'subscribe'
        ])->delete();
        return redirect()->back();
    }
}
