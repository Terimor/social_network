@auth
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="{{ $user->avatar }}" alt="">
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
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li>
                        <li>
                            <button type="submit">Post</button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth