<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        dd($role);
        if (Auth::check()) {
            if (in_array(Auth::user()->role_id, explode('|',$role))) {
                return $next($request);
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('masuk');
        }
    }
}
