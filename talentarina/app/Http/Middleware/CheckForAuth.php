<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(url()->current() == url('employer/login')) {
            if(isset(Auth::guard('employer')->user()->email)) {
                return redirect()->route('employer.dashboard');
            }
        } else if(url()->current() == url('employer/signup')) {
                if(isset(Auth::guard('employer')->user()->email)) {
                    return redirect()->route('employer.dashboard');
                }
            }
        return $next($request);
    }
}
