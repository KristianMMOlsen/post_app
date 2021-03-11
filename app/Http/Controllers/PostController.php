<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        /* returns a list of 20 posts per page,
         * also uses eager loading to reduce redundance
         * by using less queries
         */
        $posts = Post::with(['user', 'likes'])->paginate(20); 

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //validates the textarea
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
