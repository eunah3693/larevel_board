<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !$request->session()->get('id')) {
            $user = Auth::user();
            //dd($request->session()->get('id'));
            session()->put('id', $user->id);
            session()->put('name', $user->name);
            dd($request->session()->get('id'));
        }
        return $next($request);
    }
}
