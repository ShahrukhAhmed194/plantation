<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle($request, Closure $next, $type)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->type !== $type) {
            return redirect('/unauthorized');
        }

        return $next($request);
    }
}
