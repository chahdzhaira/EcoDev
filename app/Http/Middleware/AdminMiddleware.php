<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et s'il a le rôle d'admin
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request); // L'utilisateur est un admin, il peut accéder
        }

        // Si l'utilisateur n'est pas un admin, le rediriger
        return redirect('/'); // Vous pouvez rediriger vers une autre page si vous le souhaitez
    }
}