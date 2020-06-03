<?php

namespace App\Http\Middleware;


use Closure;

class UserIsInitialized
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
        $requestPath = $request->path();

        if(! $request->user()->is_init()) return redirect()->route('init_user', ['requestPath' => $requestPath]);

        return $next($request);
    }
}
