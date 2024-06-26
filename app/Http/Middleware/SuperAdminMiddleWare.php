<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class SuperAdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(Auth::user()->role == "superadmin") {
            return $next($request); 
        }

        Alert::error('Erorr', "Maaf Anda Tidak Bisa Akses Halaman Ini Karena Anda Bukan SuperAdmin!!!");
        return redirect(Session::get('_previous.url'));
    }
}