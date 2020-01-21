<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\UserRelation;

class ProfileController extends Controller
{
    public function profile(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $post_content = $request->input('post_content');
            if(!empty($post_content)) {
                $post = new Post;
                $post->content = $post_content;
                $post->profile_id = Auth::id();
                $post->save();
            }
        }
        $current_user = Profile::find($id ?? Auth::id());
        $subscribers_amount = UserRelation::getSubscribersAmount($current_user->user_id);
        $posts = $current_user->posts()->orderBy('id', 'DESC')->get();
        return view('profile/profile', ['posts' => $posts, 'current_user' => $current_user, 'subscribers_amount' => $subscribers_amount]);
    }

    public function about(Request $request, $id = null)
    {
        $user_profile = Profile::find($id ?? Auth::id());
        $current_user_profle = Profile::find(Auth::id());
        return view('profile/about', ['user' => $user_profile, 'current_user' => $current_user_profle]);
    }
}
