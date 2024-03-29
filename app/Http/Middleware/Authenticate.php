<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() && $request->is('admin/*')) {
            return route('admin.login.view');
        }

        if (! $request->expectsJson() && $request->is('office/*')) {
            return route('office.login.view');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
