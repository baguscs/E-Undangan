<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class SecurityLogin
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
        if (Auth::user()->admin->status == 2) {
            return redirect()->back()->with('pesan', 'Akun anda telah di Banned');
        }
        else{
            return $next($request);
        }
    }
}
