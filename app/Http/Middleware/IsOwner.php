<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Post;
use App\Comment;
class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $content = Post::find($request->id);
        if ($content == null)
        {
            $content = Comment::find($request->id);
        }

        if($content == null){
            return redirect('/');
        }
        elseif(Auth::user() && (Auth::user()->id == $content->user_id)){
            return $next($request);
        }
        return redirect('/');
    }
}
