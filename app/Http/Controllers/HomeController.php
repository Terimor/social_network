<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function feed()
    {
        $user = new User_tmp();
        $post = new Post_tmp($user);
        return view('feed.feed', ['user' => $user, 'posts' => [$post]]);
    }
}
