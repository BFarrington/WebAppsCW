<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Returns the creator of the comment
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Returns the post the comment belongs to
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
