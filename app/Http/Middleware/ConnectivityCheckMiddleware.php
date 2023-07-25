<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ConnectivityCheckMiddleware
{
    public function handle($request, Closure $next)
    {
        // Step 3: Check user connectivity
        if (!Auth::check()) {
            // Step 4: Redirect the user to connect
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
