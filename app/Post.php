<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Returns the creator of the post
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Returns the many Comments on the post
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
