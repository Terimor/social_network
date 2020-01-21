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
									<a class="" href="/friends/{{ $current_user->id }}" title="" data-ripple="">Friends</a>
									<a class="" href="/communities/{{ $current_user->id }}" title="" data-ripple="">Communities</a>
									<a class="" href="/about/{{ $current_user->id }}" title="" data-ripple="">about</a>
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
                                                    <a href="newsfeed.html" title="">News feed</a>
                                                </li>
                                                <li>
                                                    <i class="ti-files"></i>
                                                    <a href="fav-page.html" title="">My pages</a>
                                                </li>
                                                <li>
                                                    <i class="ti-user"></i>
                                                    <a href="timeline-friends.html" title="">friends</a>
                                                </li>
                                                <li>
                                                    <i class="ti-bell"></i>
                                                    <a href="notifications.html" title="">Notifications</a>
                                                </li>
                                                <li>
                                                    <i class="ti-power-off"></i>
                                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="">Logout</a>
                                                </li>
									</div><!-- Shortcuts -->
									<div class="widget">
										<h4 class="widget-title">Recent Activity</h4>
										<ul class="activitiez">
											<li>
												<div class="activity-meta">
													<i>10 hours Ago</i>
													<span><a href="#" title="">Commented on Video posted </a></span>
													<h6>by <a href="newsfeed.html">black demon.</a></h6>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>30 Days Ago</i>
													<span><a href="newsfeed.html" title="">Posted your status. “Hello guys, how are you?”</a></span>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>2 Years Ago</i>
													<span><a href="#" title="">Share a video on her timeline.</a></span>
													<h6>"<a href="newsfeed.html">you are so funny mr.been.</a>"</h6>
												</div>
											</li>
										</ul>
									</div><!-- recent activites -->
									<div class="widget stick-widget">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers">
											<li>
												<figure><img src="/images/resources/friend-avatar2.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Kelly Bill</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="/images/resources/friend-avatar4.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Issabel</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="/images/resources/friend-avatar6.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Andrew</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="/images/resources/friend-avatar8.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Sophia</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="/images/resources/friend-avatar3.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Allen</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
										</ul>
									</div><!-- who's following -->
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
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget friend-list stick-widget">
										<h4 class="widget-title">Friends</h4>
										<div id="searchDir"></div>
										<ul id="people-list" class="friendz-list">
											<li>
												<figure>
													<img src="/images/resources/friend-avatar.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">bucky barnes</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4136282f352433322e2d25243301262c20282d6f222e2c">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="/images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a585b48545f497a5d575b535614595557">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="/images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="127873617d7c7052757f737b7e3c717d7f">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="/images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="620803110d0c0022050f030b0e4c010d0f">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>

												<figure>
													<img src="/images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0963687a66676b496e64686065276a6664">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>

												<figure>
													<img src="/images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b313a283435391b3c363a323775383436">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>

												<figure>
													<img src="/images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="472d263428292507202a262e2b6924282a">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>

												<figure>
													<img src="/images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7a101b091514183a1d171b131654191517">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>

												<figure>
													<img src="/images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c1e1d0e12190f3c1b111d1510521f1311">[email&#160;protected]</a></i>
												</div>
											</li>
										</ul>
										<div class="chat-box">
											<div class="chat-head">
												<span class="status f-online"></span>
												<h6>Bucky Barnes</h6>
												<div class="more">
													<span><i class="ti-more-alt"></i></span>
													<span class="close-mesage"><i class="ti-close"></i></span>
												</div>
											</div>
											<div class="chat-list">
												<ul>
													<li class="me">
														<div class="chat-thumb"><img src="/images/resources/chatlist1.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="you">
														<div class="chat-thumb"><img src="/images/resources/chatlist2.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="me">
														<div class="chat-thumb"><img src="/images/resources/chatlist1.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
												</ul>
												<form class="text-box">
													<textarea placeholder="Post enter to post..."></textarea>
													<button type="submit"></button>
												</form>
											</div>
										</div>
									</div><!-- friends list sidebar -->
								</aside>
							</div><!-- sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="/js/script.js"></script>
@endsection
