<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthsUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$type)
    {
        if(in_array($request->user()->tipo, $type) == false){
            

            return redirect()->route('home');
        }else{
            
            return $next($request);
        }
    }
}
