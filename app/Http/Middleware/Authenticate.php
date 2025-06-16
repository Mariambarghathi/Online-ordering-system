<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Redirect based on guard in use
            if ($request->is('store/*')) {
                return route('guest.login.form'); // Customer login
            }
            return route('login'); // Admin login
        }

        return null;
    }
}
