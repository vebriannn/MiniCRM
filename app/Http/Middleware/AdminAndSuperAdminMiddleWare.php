<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminAndSuperAdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role != "user" ) {
            return $next($request); 
        }

        Alert::error('Erorr', "Maaf Halaman Ini Hanya Bisa Di Akses Oleh Admin Dan SuperAdmin!!!");
        return redirect(Session::get('_previous.url'));
    }
}