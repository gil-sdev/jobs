<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolUsaurio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->user()->rol === 2) return redirect()->route('home');
        

        /* Passing the request to the next middleware in the stack. */
        return $next($request);
    }
}
