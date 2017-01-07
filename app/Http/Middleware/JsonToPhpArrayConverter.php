<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class JsonToPhpArrayConverter
 * @package App\Http\Middleware
 *
 * Reference: https://laracasts.com/discuss/channels/laravel/how-to-validate-json-input-using-requests/replies/103849
 *
 * This middleware converts JSON data to PHP Array which can later be used for routine validation
 *
 */
class JsonToPhpArrayConverter
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
        $data = (array) json_decode($request->getContent());

        if (json_last_error() === JSON_ERROR_NONE) {
            $request->merge($data);
        } else {
            abort(400);
        }

        return $next($request);
    }
}
