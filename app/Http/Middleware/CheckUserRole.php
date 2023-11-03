<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Pastikan bahwa user terotentikasi dan memenuhi kriteria peran yang diinginkan
        if ($request->user() && $request->user()
        ->role_id === 1 &&
        $request->user()->role->name === 'admin') {
            return $next($request);
        }

        // Jika tidak memenuhi kriteria, alihkan atau berikan respons sesuai kebutuhan
        return redirect('/')->with('error', 'Unauthorized Access');
    }
}
