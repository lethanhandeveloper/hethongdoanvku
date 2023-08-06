<?php

namespace App\Http\Middleware;

use Closure;

class DisableCsrfProtection
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
        // Bỏ qua CSRF token cho các request POST và PUT
        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
            return $next($request);
        }
        // Xử lý các request khác bình thường
        return parent::handle($request, $next);
    }
}