@extends('layouts.default')

@section('content')
    @include('feed.addnewpost')
    <!-- add post new box -->
    @foreach($posts as $post)
    @include('feed.post', [$post])
    @endforeach
@endsection
