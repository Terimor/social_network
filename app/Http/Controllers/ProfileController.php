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
        $user_profile = Profile::find($id ?? Auth::id());
        $current_user_profle = Profile::find(Auth::id());
        $posts = $user_profile->posts()->orderBy('id', 'DESC')->get();
        return view('profile/profile', ['user' => $user_profile, 'posts' => $posts, 'current_user' => $current_user_profle]);
    }

    public function about(Request $request, $id = null)
    {
        $user_profile = Profile::find($id ?? Auth::id());
        $current_user_profle = Profile::find(Auth::id());
        return view('profile/about', ['user' => $user_profile, 'current_user' => $current_user_profle]);
    }
}
