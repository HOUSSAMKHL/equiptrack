<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status !== 'actif') {
            auth()->user()->tokens()->delete();
            return response()->json(['message' => 'Compte désactivé'], 403);
        }

        return $next($request);
    }
}