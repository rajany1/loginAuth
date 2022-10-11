<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class alreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
        if (Session()->has('loginId') && (url('login')==$req->url() || url('login')==$req->url())) {
            # code...
            return back();
        }
        return $next($req);
    }
}
