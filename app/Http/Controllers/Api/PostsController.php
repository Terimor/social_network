<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function store(Request $request, Post $post) {
        $post = Post::create($request->all());
        return $post;
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());
        return $post;
    }

    public function delete(Request $request, Post $post) {
        $post->delete();
        return response()->json(null, 204);
    }
}
