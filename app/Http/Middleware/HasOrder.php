<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasOrder
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
        if (Auth::check() && Auth::user()->user_type == 0) {
            if (empty(Order::where('user_id', Auth::user()->id)->count())) {
                return redirect()->route('customer.sales-process.cart');
            }
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
        
        return $next($request);
    }
}
