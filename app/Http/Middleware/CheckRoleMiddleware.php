<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$role): Response
    {
        // Authentication: user must be logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Authorization: blocked (inactive) accounts cannot continue
        if ($user->status === false || $user->status === 0) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->withErrors([
                'email' => 'Your account is inactive. Please contact the administrator.'
            ]);
        }

        // Admin has full access to every route
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Other roles must be listed in the allowed roles
        if (!in_array($user->role, $role, true)) {
            abort(403, "You don't have permission to access this route!");
        }

        return $next($request);
    }
}
