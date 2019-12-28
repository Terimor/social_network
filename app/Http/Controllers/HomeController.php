<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Action;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        }
        $posts = Post::orderBy('id', 'DESC')->get();
        $user_profile = Profile::find(Auth::id());
        foreach($posts as &$post)
        {
            $post->attachment_photos = [];
        }
        return view('feed.feed', ['user' => $user_profile, 'posts' => $posts]);
    }

    public function subscribes(Request $request) {
        $view_data['subscribes'] = Action::where([
            'action' => 'subscribe',
            'target' => $this->user->id,
        ])->orderBy('id', 'desc')->limit(10)->get();

        $view_data['subscribes'] = Action::where([
            'action' => 'subscribe',
            'actor' => $this->user->id,
        ])->orderBy('id', 'desc')->limit(10)->get();

        return view('subscribes.subscribes', $view_data);
    }
}
