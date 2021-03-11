<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
        {
            $this->middleware(['auth']);
        }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user()))
        {
            return response(null, 409); // returns an error message if a user tries to like the same post  more than once
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    //method for deleting a like from a post
    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }

}
