<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // auth to make a user have to sign in to create or delete posts, and guests can only view posts
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    //method to show the posts
    public function index()
    {
        /* returns a list of 20 posts per page,
         * also uses eager loading to reduce redundance
         * by using less queries
         */
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    // method to show a single post with a new view
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    //method for storing a post in the database
    public function store(Request $request)
    {
        $this->validate($request, [ //validates the textarea
            'title' => 'required',
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('title', 'body'));

        return back();
    }

    //method to delete posts that your user have created
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); //throws excpetion if trying to delete someone elses post

        $post->delete();

        return back();
    }
}
