<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use Illuminate\Support\Facades\Auth;

class HasCartItems
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
        if (Auth::check()) {
            if (empty(CartItem::where('user_id', Auth::user()->id)->count())) {
                return redirect()->route('customer.sales-process.cart');
            }
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
        return $next($request);
    }
}
