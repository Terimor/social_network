<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(Request $request, $id = null)
    {
        $profile = Profile::find($id ?? Auth::id());
        $posts = $profile->posts()->orderBy('id', 'DESC')->get();
        return view('profile/profile', ['posts' => $posts, 'profile' => $profile]);
    }

    public function about(Request $request, $id = null)
    {
        $user_profile = Profile::find($id ?? Auth::id());
        $current_user_profle = Profile::find(Auth::id());
        return view('profile/about', ['user' => $user_profile, 'current_user' => $current_user_profle]);
    }
}
