<?php

namespace App\Http\Middleware;

use App\AccessLog;
use Closure;

class AccessLogMiddleware
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

        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        AccessLog::create(['log' => "IP $ip requisitou a rota $route" ]);
        return $next($request);
    }
}
