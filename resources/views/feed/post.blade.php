<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="{{ $post->author->avatar }}" alt="">
            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title="">{{ $post->author->name }}</a></ins>
                <span>{{ $post->date_created }}</span>
            </div>
            <div class="description">
                    <p>
                        {{ $post->content }}
                    </p>
            </div>
            <div class="post-meta">
                @foreach($post->attachment_photos as $photo)
                <img src="{{ $photo }}" alt="">
                @endforeach
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
                        <li>
                            <span class="dislike" data-toggle="tooltip" title="dislike">
                                <i class="ti-heart-broken"></i>
                                <ins>{{ $post->dislike_count }}</ins>
                            </span>
                        </li>
                        @auth
                        <li class="social-media">
                            <div class="menu">
                                <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                    </div>
                                </div>
                                <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        @foreach ($post->comments as $comment)
            <li>
                <div class="comet-avatar">
                    <img src="{{ $comment->author_avatar }}" alt="">
                </div>
                <div class="we-comment">
                    <div class="coment-head">
                        <h5><a href="time-line.html" title="">{{ $comment->author_name }}</a></h5>
                        <span>@php echo time_elapsed_string($comment->date_created); @endphp</span>
                        @auth
                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                        @endauth
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
            </li>
        @endforeach
    </div>
</div>
