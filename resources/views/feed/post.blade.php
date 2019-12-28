<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="{{ $post->profile->avatar }}" alt="">
            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title="">{{ $post->profile->name }}</a></ins>
                <span>{{ $post->date_created }}</span>
            </div>
            <div class="description">
                    <p>
                        {{ $post->content }}
                    </p>
            </div>
            <div class="post-meta">
                
                <div class="we-video-info">
                    <ul>
                        <li>
                            <span class="views" data-toggle="tooltip" title="views">
                                <i class="fa fa-eye"></i>
                                <ins>{{ $post->view_count }}</ins>
                            </span>
                        </li>
                        <li>
                            <span class="comment" data-toggle="tooltip" title="Comments">
                                <i class="fa fa-comments-o"></i>
                                <ins>{{ $post->comment_count }}</ins>
                            </span>
                        </li>
                        <li>
                            <span class="like" data-toggle="tooltip" title="like">
                                <i class="ti-heart"></i>
                                <ins>{{ $post->like_count }}</ins>
                            </span>
                        </li>  
                    </ul>
                </div>
            </div>
        </div>
        <div class="coment-area">
            <ul class="we-comet">
            @foreach ($post->comments as $comment)
                <li>
                    <div class="comet-avatar">
                        <img src="{{ $comment->author_avatar }}" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title="">{{ $comment->profile->name }}</a></h5>
                            <span>@php echo time_elapsed_string($comment->date_created); @endphp</span>
                            @auth
                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                            @endauth
                        </div>
                        <p>{{ $comment->content }}</p>
                    </div>
                </li>
            @endforeach
                @auth
                <li class="post-comment">
                    <div class="comet-avatar">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="post-comt-box">
                        <form method="post">
                            <textarea placeholder="Post your comment"></textarea>
                            <button type="submit"></button>
                        </form>	
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
