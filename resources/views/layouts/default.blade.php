<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>LookTook Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        .collapse {
            display: block;
            max-height: 0px;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
        }
        .collapse.show {
            max-height: 99em;
            transition: max-height 0.5s ease-in-out;
        }

    </style>
    <script>
        function reply(e, user_id, post_id)
        {
            var element = document.getElementById("comment_post_" + post_id);
            element.value = "@" + user_id + " ";
            element.focus();
            window.scrollBy({
                top: element.getBoundingClientRect().y - 200,
                behavior: 'smooth'
            });
            e.preventDefault();
        }
        function send_like(post_id)
        {
            var like_icon = document.getElementById("post_like_icon_" + post_id);
            var element = document.getElementById("post_like_counter_" + post_id);
            xhr = new XMLHttpRequest();
            if (like_icon.classList.contains('ti-heart')) {
                xhr.open('POST', '/feed/like');
            } else {
                xhr.open('POST', '/feed/unlike');
            }
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    if (xhr.responseText == "liked") {
                        like_icon.classList.remove('ti-heart');
                        like_icon.classList.add('ti-heart-broken');
                        element.innerHTML = parseInt(element.innerHTML) + 1;
                    } else if(xhr.responseText == "unliked") {
                        like_icon.classList.remove('ti-heart-broken');
                        like_icon.classList.add('ti-heart');
                        element.innerHTML = parseInt(element.innerHTML) - 1;
                    }
                }
                else if (xhr.status !== 200) {

                }
            };
            xhr.send(param({
                'post_id' : post_id,
                '_token' : '{{ csrf_token() }}'
            }));
        }
        function param(object) {
            var encodedString = '';
            for (var prop in object) {
                if (object.hasOwnProperty(prop)) {
                    if (encodedString.length > 0) {
                        encodedString += '&';
                    }
                    encodedString += encodeURI(prop + '=' + object[prop]);
                }
            }
            return encodedString;
        }
        const triggers = Array.from(document.querySelectorAll('[data-toggle="collapse"]'));

        window.addEventListener('click', (ev) => {
            const elm = ev.target;
            if (triggers.includes(elm)) {
                const selector = elm.getAttribute('data-target');
                collapse(selector, 'toggle');
            }
        }, false);


        const fnmap = {
            'toggle': 'toggle',
            'show': 'add',
            'hide': 'remove'
        };
        const collapse = (selector, cmd) => {
            const targets = Array.from(document.querySelectorAll(selector));
            targets.forEach(target => {
                target.classList[fnmap[cmd]]('show');
            });
        }
    </script>
</head>

<body>
<div class="theme-layout">
    <div class="responsive-header">
    <div class="mh-head first Sticky">
        <span class="mh-btns-left">
            <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
        </span>
        <span class="mh-text">
            <a href="/feed" title=""><img src="images/logo2.png" alt=""></a>
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
                    <li><a href="/feed" title="">news feed</a></li>
                </ul>
            </li>
            <li><span>Social</span>
                <ul>
                    <li><a href="/subscribers" title="">subscribers</a></li>
                    <li><a href="/communities" title="">communities</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    </div><!-- responsive header -->

    <div class="topbar stick">
            <div class="logo">
                <a title="" href="/feed"><img src="images/logo.png" alt=""></a>
            </div>

            <div class="top-area">

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
                    <li><a href="/feed" title="Home" data-ripple=""><i class="ti-home"></i></a></li>


                </ul>
                <div class="user-img">
                    <img src="{{ $user->profile->avatar }}" alt="" width="60px">
                    <span class="status f-online"></span>
                    <div class="user-setting">

                        <a href="#" title=""><i class="ti-user"></i> view profile</a>
                        <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>


                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off"></i>
                                        log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div><!-- topbar -->
</div>
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

                                    @yield('content')

                                </div>
                                <div class="col-lg-3">
                                </div><!-- sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
