<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('admin.auth.login.form');
        }

        if (auth()->user()->user_type !== 1) {
            return redirect()->route('customer.home');
        }

        if (auth()->user()->status !== 1) {
            session()->invalidate();
            Auth::logout();

            return redirect()->route('admin.auth.login.form')->with('accessDenied', true);
        }

        return $next($request);
    }
}
