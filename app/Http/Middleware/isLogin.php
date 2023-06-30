<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
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
        if (Auth::check()) {  //jika auth checknya dlm keadaan true artinya dia sudah login maka akan kita perbolehkan dia ke alamat yang dia tuju
            return $next($request);  // alamat yg selanjutnya didefinisikan oleh next
        }
        return redirect('sesi')->withErrors('Silahkan login terlebih dahulu');
    }
}
