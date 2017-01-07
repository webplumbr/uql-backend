<?php

namespace App\Http\Middleware;

use Closure;

class ValidUserCheck
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
        $token = $request->header('X-VALID-USER', null);

        if (empty($token)) {
            abort(401);
        }
        
        return $next($request);
    }
}
