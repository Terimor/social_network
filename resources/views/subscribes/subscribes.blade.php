@extends('layouts.default');

@section('content')
    <div class="central-meta">
        <div class="frnds">
            <ul class="nav nav-tabs">
                 <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Subscribers</a> <span>{{ count($subscribers) }}</span></li>
                 <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Subscribes</a><span>{{ count($subscribes) }}</span></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active fade show " id="frends" >
                <ul class="nearby-contct">
                    @foreach($subscribers as $subscriber)
                    @include('subscibe',array_merge([$subsrcibe],['action' => 'Block']))
                    @endforeach
                </ul>
                  <button class="btn-view btn-load-more"></button>
              </div>
              <div class="tab-pane" id="frends-req">
                <ul class="nearby-contct">
                    @foreach($subscribes as $subscribe)
                    @include('subscibe',array_merge([$subsrcibe],['action' => 'Unsubscribe']))
                    @endforeach
                </ul>
                  <button class="btn-view btn-load-more"></button>
              </div>
            </div>
        </div>
    </div>
@endsection
