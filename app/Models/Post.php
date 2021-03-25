<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    /* method to stop a user from liking the same post multiple times
     * by checking if the user exists in the list of users that have liked
     */
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    // method to stop a user deleting other users posts
    /*
    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }
    */

    // method to show username on posts
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // method that shows likes on posts
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //method to display comments
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    
}
