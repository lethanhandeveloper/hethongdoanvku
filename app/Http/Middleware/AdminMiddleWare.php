<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class AdminMiddleWare
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
        if (
            empty(json_decode(Cookie::get('user_cookie')))
            || json_decode(Cookie::get('user_cookie'))->type !== 'admin'
        ) {
            return redirect("/");
        }

        return $next($request);
    }
}
