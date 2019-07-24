<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $request->validate([
            'data'      => 'required|string',
            'user_id'      => 'required',
        ]);
        $post = new Post([
            'data'      => $request->data,
            'user_id'     => $request->user_id,
            'url'  =>   $request->url,
            'status_id'    => $request->status_id
        ]);
        $post->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function myPosts(Request $request, Post $post){
        return response()->json(Post::all());
    }

}
