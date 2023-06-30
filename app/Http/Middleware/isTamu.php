<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) { //jika auth checknya dlm keadaan true artinya dia sudah login 
            return redirect('/sesi/awal')->withErrors('success', 'Kamu sudah dalam keadaan login');
            // jika dia sudah login kita akan meredirect nya
        }
        return $next($request);  // dan jika belum dia hanya bisa mengakses halaman-halaman yg diperuntukan untuk tamu saja
    }
}
