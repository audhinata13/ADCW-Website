<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Jika belum login, lanjutkan (biarkan middleware auth yang handle)
        if (!$user) {
            return $next($request);
        }

        if (is_null($user->email_verified_at)) {
            Auth::logout();
            return redirect()->route('frontend.verify', [
                'email' => $user->email
            ])->with('error', 'Please verify your email.');
        }

        return $next($request);
    }
}
