<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Store
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->store && auth()->user()->type == User::storeOwnerRole) {
            return $next($request);
        }
        return redirect()->route('dashboard.home');
    }
}
