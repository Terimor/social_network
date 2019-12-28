<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Profile;

class ProfilesController extends Controller
{
    public function index(Profile $profile) {
        return Post::where('profile_id', $profile->id)->with('comments')
            ->orderBy('id', 'desc');
    }
}
