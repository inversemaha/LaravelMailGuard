<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            // Log the user out
            Auth::logout();

            // Invalidate the session and regenerate the token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/register')->withErrors([
                'message' => 'Please verify your email address to access this resource.',
            ]);
        }

        return $next($request);
    }
}
