<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    /* method to stop a user from liking the same post multiple times
     * by checking if the user exists in the list of users that have liked
     */
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

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
}
