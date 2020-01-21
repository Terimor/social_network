<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Winku Social Network Toolkit</title>
    <link rel="icon" href="/images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/responsive.css">
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
            <a href="/feed" title=""><img src="/images/logo2.png" alt=""></a>
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
                <a title="" href="newsfeed.html"><img src="/images/logo.png" alt=""></a>
            </div>


        </div><!-- topbar -->
        @yield('page')
</div>
</body>
