<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Post;

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
        if(Auth::user() && (Auth::user()->id == Post::findOrFail($request->post_id)->user_id)){
            return $next($request);
        }
        return redirect('/');
    }
}
