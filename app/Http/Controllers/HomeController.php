<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Action;
use App\Member;
use App\User;
use App\UserRelation;
use App\Comment;

class User_tmp {
    public $avatar = 'https://lh3.googleusercontent.com/-0dpgowxQJsk/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rdzmsG0vXTDn3aDUvBQCPxpRLENlg.CMID/s83-c/photo.jpg';
    public $name = "Лучший в мире за работой";
}

class Post_tmp {
    public function __construct($user)
    {
        $this->author = $user;
    }
    public $author;
    public $date_created = "2019-01-01 23:59:59";
    public $attachment_photos = ['https://i.ytimg.com/vi/F_VP-U1-LeA/maxresdefault.jpg'];
    public $view_count = 228;
    public $comment_count = 0;
    public $like_count = 64;
    public $dislike_count = 0;
    public $comments = [];
    public $content = "Здравствуйте дорогие друзья, знаю все ждали выход этого видоса. Приятного просмотра! НЫаАААА";
}

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function like(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post_id = $request->input('post_id');
            if(Action::where('user_id', Auth::id())->where('post_id', $post_id))
            {
                return response('was already liked', 200)
                  ->header('Content-Type', 'text/plain');
            }
            if(isset($post_id))
            {
                $action = new Action;
                $action->action_type = 'like';
                $action->post_id = $post_id;
                $action->user_id = Auth::id();
                $action->save();
                return response('liked', 200)
                  ->header('Content-Type', 'text/plain');
            }
        }
    }

    public function unlike(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post_id = $request->input('post_id');
            if(isset($post_id))
            {
                Action::where('user_id', Auth::id())->where('post_id', $post_id)->delete();
                return response('unliked', 200)
                  ->header('Content-Type', 'text/plain');
            }
        }
    }

    public function feed(Request $request)
    {
        if ($request->isMethod('post')) {
            $post_content = $request->input('post_content');
            if(!empty($post_content)) {
                $post = new Post;
                $post->content = $post_content;
                $post->profile_id = Auth::id();
                $post->save();
            }
            $comment_content = $request->input('post_comment');
            if(!empty($comment_content))
            {
                $post_id = $request->input('post_id');
                $comment = new Comment;
                $comment->post_id = $post_id;
                $comment->user_id = Auth::id();
                $comment->content = $comment_content;
                $comment->save();
            }
            return redirect('/feed');
        }

        $subscribes = $this->user->subscribes(true);

        $posts = Post::whereHas('profile', function($query) use ($subscribes) {
            $query->whereIn('user_id', array_merge($subscribes, [$this->user->id]));
        })->orderBy('id', 'DESC')->get();

        foreach($posts as &$post)
        {
            $post->attachment_photos = [];
        }
        return view('feed.feed', ['posts' => $posts]);
    }

    public function subscribes(Request $request) {
        $subscribes = UserRelation::where([
            'action' => 'subscribe',
            'actor' => $this->user->id,
        ])->pluck('target')->all();

        $subscribers = UserRelation::where([
            'action' => 'subscribe',
            'target' => $this->user->id,
        ])->pluck('actor')->all();

        $view_data['subscribes'] = User::whereIn('id', $subscribes)->orderBy('id', 'DESC')->get();
        $view_data['subscribers'] = User::whereIn('id', $subscribers)->orderBy('id', 'DESC')->get();

        return view('subscribes.subscribes', $view_data);
    }

    public function communities(Request $request) {
        $memberships = Member::where('user_id', Auth::id())->get();
        $view_data['communities'] = array();
        foreach($memberships as $membership) {
            $view_data['communities'][] = $membership->community;
        }

        return view('communities.communities');
    }
}
