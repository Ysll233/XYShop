<?php

namespace App\Http\Middleware;

use App\Models\Console\Config;
use Cache;
use Closure;

class ConfigMiddleware
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
        if (Cache::has('config') !== true) {
            $config = Config::find(1)->toArray();
            Cache::forever('config', $config);
        }
        return $next($request);
    }
}
