<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">

        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a href="/feed" title=""><img src="images/logo2.png" alt=""></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input placeholder="search" />
                    <a href="#/" class="fa fa-search"></a>
                </form>
            </div>
            <nav id="menu" class="res-menu">
                <ul>
                    <li><span>Home</span>
                        <ul>
                            <li><a href="{{ url('feed') }}" title="">news feed</a></li>
                        </ul>
                    </li>
                    <li><span>Social</span>
                        <ul>
                            <li><a href="{{ url('subscribes') }}" title="">subscribes</a></li>
                            <li><a href="/communities" title="">communities</a></li>
                        </ul>
                    </li>
                    <li><span>Account Setting</span>
                        <ul>
                            <li><a href="create-fav-page.html" title="">edit profile</a></li>
                            <li><a href="edit-account-setting.html" title="">edit account details</a></li>
                            <li><a href="edit-interest.html" title="">security settings</a></li>
                        </ul>
                    </li>
                    <li><span>More pages</span>
                        <ul>
                            <li><a href="careers.html" title="">Careers</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html" title="">about</a></li>
                    <li><a href="about-company.html" title="">About Us2</a></li>
                    <li><a href="contact.html" title="">contact</a></li>
                    <li><a href="contact-branches.html" title="">Contact Us2</a></li>
                    <li><a href="widgets.html" title="">Widgts</a></li>
                </ul>
            </nav>
            <nav id="shoppingbag">
                <div>
                    <div class="">
                        <form method="post">
                            <div class="setting-row">
                                <span>use night mode</span>
                                <input type="checkbox" id="nightmode" />
                                <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notifications</span>
                                <input type="checkbox" id="switch2" />
                                <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Notification sound</span>
                                <input type="checkbox" id="switch3" />
                                <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>My profile</span>
                                <input type="checkbox" id="switch4" />
                                <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show profile</span>
                                <input type="checkbox" id="switch5" />
                                <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                        <h4 class="panel-title">Account Setting</h4>
                        <form method="post">
                            <div class="setting-row">
                                <span>Sub users</span>
                                <input type="checkbox" id="switch6" />
                                <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>personal account</span>
                                <input type="checkbox" id="switch7" />
                                <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Business account</span>
                                <input type="checkbox" id="switch8" />
                                <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Show me online</span>
                                <input type="checkbox" id="switch9" />
                                <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Delete history</span>
                                <input type="checkbox" id="switch10" />
                                <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                            <div class="setting-row">
                                <span>Expose author name</span>
                                <input type="checkbox" id="switch11" />
                                <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div><!-- responsive header -->

        <div class="topbar stick">
            <div class="logo">
                <a title="" href="newsfeed.html"><img src="images/logo.png" alt=""></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <a href="#" title="">Home</a>
                        <ul>
                            <li><a href="{{ url('feed') }}" title="">news feed</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">social</a>
                        <ul>
                            <li><a href="{{ url('subscribes') }}" title="">Subscribes</a></li>
                            <li><a href="/communities" title="">communities</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">account settings</a>
                        <ul>
                            <li><a href="create-fav-page.html" title="">edit profile</a></li>
                            <li><a href="edit-account-setting.html" title="">edit account details</a></li>
                            <li><a href="edit-interest.html" title="">security settings</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">more pages</a>
                        <ul>
                            <li><a href="careers.html" title="">Careers</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="setting-area">
                    <li>
                        <a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
                        <div class="searched">
                            <form method="post" class="form-search">
                                <input type="text" placeholder="Search Friend">
                                <button data-ripple><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li><a href="newsfeed.html" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
                    <li>
                        <a href="#" title="Notification" data-ripple="">
                            <i class="ti-bell"></i><span>1</span>
                        </a>
                        <div class="dropdowns">
                            <span>1 New Notifications</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="https://vignette.wikia.nocookie.net/stalker/images/d/d1/%D0%A1%D0%B8%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D0%B8%D1%87-%D1%82%D1%87.png/revision/latest?cb=20180530164054&path-prefix=ru" alt="">
                                        <div class="mesg-meta">
                                            <h6>Сидорович</h6>
                                            <span>Иди своей дорогой сталкер</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                            </ul>
                            <a href="notifications.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>1</span></a>
                        <div class="dropdowns">
                            <span>1 New Messages</span>
                            <ul class="drops-menu">
                                <li>
                                    <a href="notifications.html" title="">
                                        <img src="https://vignette.wikia.nocookie.net/stalker/images/9/92/%D0%A1%D1%82%D1%80%D0%B5%D0%BB%D0%BE%D0%BA.png/revision/latest?cb=20120207133647&path-prefix=ru" alt="">
                                        <div class="mesg-meta">
                                            <h6>Стрелок</h6>
                                            <span>Я не знаю, правильно я поступил или нет... Наверное, никогда не узнаю... Но я сделал выбор... Надеюсь, он был верным.</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </a>
                                    <span class="tag green">New</span>
                                </li>
                            </ul>
                            <a href="messages.html" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                </ul>
                <div class="user-img">
                    <img src="{{ $user->avatar }}" alt="" width="60px">
                    <span class="status f-online"></span>
                    <div class="user-setting">
                        <a href="#" title=""><span class="status f-online"></span>online</a>
                        <a href="#" title=""><span class="status f-away"></span>away</a>
                        <a href="#" title=""><span class="status f-off"></span>offline</a>
                        <a href="#" title=""><i class="ti-user"></i> view profile</a>
                        <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                        <a href="#" title=""><i class="ti-target"></i>activity log</a>
                        <a href="#" title=""><i class="ti-settings"></i>account setting</a>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off"></i>
                                        log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </div>
                </div>
                <span class="ti-menu main-menu" data-ripple=""></span>
            </div>
        </div><!-- topbar -->

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
                                                    <a href="{{ url('subscribes') }}" title="">Subscribes</a>
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
                                            </ul>
                                        </div><!-- Shortcuts -->
                                        <div class="widget">
                                            <h4 class="widget-title">Recent Activity</h4>
                                            <ul class="activitiez">
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>10 hours Ago</i>
                                                        <span><a href="#" title="">Commented on Video posted </a></span>
                                                        <h6>by <a href="time-line.html">black demon.</a></h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>30 Days Ago</i>
                                                        <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity-meta">
                                                        <i>2 Years Ago</i>
                                                        <span><a href="#" title="">Share a video on her timeline.</a></span>
                                                        <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- recent activites -->
                                        <div class="widget stick-widget">
                                            <h4 class="widget-title">Who's follownig</h4>
                                            <ul class="followers">
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                                        <a href="#" title="" class="underline">Add Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Issabel</a></h4>
                                                        <a href="#" title="" class="underline">Add Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Andrew</a></h4>
                                                        <a href="#" title="" class="underline">Add Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar8.jpg" alt=""></figure>
                                                    <div class="friend-meta">
                                                        <h4><a href="time-line.html" title="">Sophia</a></h4>
                                                        <a href="#" title="" class="underline">Add Friend</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
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

                                    @yield('content')

                                </div>
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <div class="widget">
                                            <h4 class="widget-title">Your page</h4>
                                            <div class="your-page">
                                                <figure>
                                                    <a href="#" title=""><img src="{{$user->avatar}}" alt=""></a>
                                                </figure>
                                                <div class="page-meta">
                                                    <a href="#" title="" class="underline">{{$user->name}}</a>
                                                    <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>0</em></a></span>
                                                </div>
                                                <div class="page-likes">
                                                    <ul class="nav nav-tabs likes-btn">
                                                        <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
                                                        <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active fade show " id="link1">
                                                            <span><i class="ti-heart"></i>884</span>
                                                            <a href="#" title="weekly-likes">35 new likes this week</a>
                                                            <div class="users-thumb-list">
                                                                <a href="#" title="Anderw" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-1.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="frank" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-2.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Sara" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-3.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Amy" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-4.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Ema" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-5.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Sophie" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-6.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Maria" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-7.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="link2">
                                                            <span><i class="ti-eye"></i>440</span>
                                                            <a href="#" title="weekly-likes">440 new views this week</a>
                                                            <div class="users-thumb-list">
                                                                <a href="#" title="Anderw" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-1.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="frank" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-2.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Sara" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-3.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Amy" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-4.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Ema" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-5.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Sophie" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-6.jpg" alt="">
                                                                </a>
                                                                <a href="#" title="Maria" data-toggle="tooltip">
                                                                    <img src="images/resources/userlist-7.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- page like widget -->
                                        <div class="widget friend-list stick-widget">
                                            <h4 class="widget-title">Friends</h4>
                                            <div id="searchDir"></div>
                                            <ul id="people-list" class="friendz-list">
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">bucky barnes</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f2859b9c869780819d9e969780b2959f939b9edc919d9f">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar2.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Sarah Loren</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ea888b98848f99aa8d878b8386c4898587">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar3.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">jason borne</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2d474c5e42434f6d4a404c4441034e4240">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar4.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Cameron diaz</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6802091b07060a280f05090104460b0705">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar5.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">daniel warber</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4e242f3d21202c0e29232f2722602d2123">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar6.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">andrew</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1872796b77767a587f75797174367b7775">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar7.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">amy watson</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="711b10021e1f1331161c10181d5f121e1c">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar5.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">daniel warber</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="234942504c4d4163444e424a4f0d404c4e">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar2.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Sarah Loren</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d5b7b4a7bbb0a695b2b8b4bcb9fbb6bab8">[email&#160;protected]</a></i>
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
                                                            <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
                                                            <div class="notification-event">
                                                                <span class="chat-message-item">
                                                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                                                </span>
                                                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="you">
                                                            <div class="chat-thumb"><img src="images/resources/chatlist2.jpg" alt=""></div>
                                                            <div class="notification-event">
                                                                <span class="chat-message-item">
                                                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                                                </span>
                                                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="me">
                                                            <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
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
                                                        <div class="add-smiles">
                                                            <span title="add icon" class="em em-expressionless"></span>
                                                        </div>
                                                        <div class="smiles-bunch">
                                                            <i class="em em---1"></i>
                                                            <i class="em em-smiley"></i>
                                                            <i class="em em-anguished"></i>
                                                            <i class="em em-laughing"></i>
                                                            <i class="em em-angry"></i>
                                                            <i class="em em-astonished"></i>
                                                            <i class="em em-blush"></i>
                                                            <i class="em em-disappointed"></i>
                                                            <i class="em em-worried"></i>
                                                            <i class="em em-kissing_heart"></i>
                                                            <i class="em em-rage"></i>
                                                            <i class="em em-stuck_out_tongue"></i>
                                                        </div>
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

            <div class="container">
                <div class="row">
                    Looktook Inc. 2019 &copy;
                </div>
            </div>
    </div>
    <div class="side-panel">
        <h4 class="panel-title">General Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>use night mode</span>
                <input type="checkbox" id="nightmode1" />
                <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notifications</span>
                <input type="checkbox" id="switch22" />
                <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Notification sound</span>
                <input type="checkbox" id="switch33" />
                <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>My profile</span>
                <input type="checkbox" id="switch44" />
                <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show profile</span>
                <input type="checkbox" id="switch55" />
                <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
            </div>
        </form>
        <h4 class="panel-title">Account Setting</h4>
        <form method="post">
            <div class="setting-row">
                <span>Sub users</span>
                <input type="checkbox" id="switch66" />
                <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>personal account</span>
                <input type="checkbox" id="switch77" />
                <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Business account</span>
                <input type="checkbox" id="switch88" />
                <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Show me online</span>
                <input type="checkbox" id="switch99" />
                <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Delete history</span>
                <input type="checkbox" id="switch101" />
                <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
            </div>
            <div class="setting-row">
                <span>Expose author name</span>
                <input type="checkbox" id="switch111" />
                <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
            </div>
        </form>
    </div><!-- side panel -->

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/map-init.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>

</html>
