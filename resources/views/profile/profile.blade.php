@extends('layouts.header')
@section('page')
    <section>
		<div class="feature-photo">
			<figure><img src="/images/resources/timeline-1.jpg" alt=""></figure>
			<div class="add-btn">
                <span>{{$subscribers_amount}} followers</span>
                @if($user)
                    @if($user->id !== $current_user->user_id)
                        @if(\App\UserRelation::checkRelation($user->id, $current_user->user_id, 'subscribe'))
                            <a href="{{url("profile/$current_user->user_id/unfollow")}}" title="" data-ripple="">Unfollow</a>
                        @else
                            <a href="{{url("profile/$current_user->user_id/subscribe")}}" title="" data-ripple="">Subscribe</a>
                        @endif
                    @endif
                @endif
			</div>
			<form class="edit-phto">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file"/>
				</label>
			</form>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="{{ $current_user->avatar }}" alt="">
								<form class="edit-phto">
									<i class="fa fa-camera-retro"></i>
									<label class="fileContainer">
										Edit Display Photo
										<input type="file"/>
									</label>
								</form>
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5>{{ $current_user->name }}</h5>
								  <span>Member</span>
								</li>
								<li>
									<a class="active" href="/profile/{{ $current_user->id }}" title="" data-ripple="">Feed</a>

								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
                                        <h4 class="widget-title">Shortcuts</h4>
                                        <ul class="naves">
                                            <li>
                                                <i class="ti-clipboard"></i>
                                                <a href="/feed" title="">News feed</a>
                                            </li>
                                            <li>
                                                <i class="ti-user"></i>
                                                <a href="{{ url('subscribes') }}" title="">Subscribes</a>
                                            </li>
                                            <li>
                                                <i class="ti-comments"></i>
                                                <a href="notifications.html" title="">Communities</a>
                                            </li>
                                            <li>
                                                <i class="ti-power-off"></i>
                                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" title="">Logout</a>
                                            </li>
                                        </ul>
                                    </div><!-- Shortcuts -->


								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="loadMore">
                                    @if($current_user->id == $user->id)
									<div class="central-meta item">
										<div class="new-postbox">
											<figure>
												<img src="{{ $current_user->avatar }}" alt="">
											</figure>
											<div class="newpst-input">
												<form method="post">
													<textarea rows="2" placeholder="write something"></textarea>
													<div class="attachments">
														<ul>
															<li>
																<i class="fa fa-music"></i>
																<label class="fileContainer">
																	<input type="file">
																</label>
															</li>
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input type="file">
																</label>
															</li>
															<li>
																<i class="fa fa-video-camera"></i>
																<label class="fileContainer">
																	<input type="file">
																</label>
															</li>
															<li>
																<button type="submit">Publish</button>
															</li>
														</ul>
													</div>
												</form>
											</div>
										</div>
                                    </div><!-- add post new box -->
                                    @endif
									@foreach($posts as $post)
                                    @include('feed.post', [$post])
                                    @endforeach
								</div>
							</div><!-- centerl meta -->

						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="/js/script.js"></script>
@endsection
