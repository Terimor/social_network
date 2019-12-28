<li>
    <div class="nearly-pepls">
        <figure>
            <a href="{{ url('/profiles/$id') }}" title=""><img src="{{ $avatar }}" alt="avatar"></a>
        </figure>
        <div class="pepl-info">
            <h4><a href="{{ url('/profiles/$id') }}" title="">{{ $name }}</a></h4>
            <span>ftv model</span>
            <a href="javascript:void(0)" title="" class="add-butn action-button" data-ripple="">{{ $action }}</a>
        </div>
    </div>
</li>
