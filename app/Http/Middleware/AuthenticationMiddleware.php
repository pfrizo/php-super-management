<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AuthenticationMiddleware
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
        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        } else {
            return redirect()->route('website.login', ['error' => 2]);
        }

        
    }
}
