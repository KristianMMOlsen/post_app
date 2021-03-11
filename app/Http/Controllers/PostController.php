<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
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

    //method for storing a post in the database
    public function store(Request $request)
    {
        $this->validate($request, [ //validates the textarea
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    //method to delete posts that your user have created
    public function destroy(Post $post)
    {
        $this->authorize('delete' . $post); //throws excpetion if trying to delete someone elses post

        $post->delete();

        return back();
    }
}
