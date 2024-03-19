<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // nếu level =1 (admin)
                if ($user->level == 1 ) {
                    return redirect()->route('adminlogin');
                } else {
                    return $next($request);
                    // return redirect()->route('getLogin');
                }
        } else {
            return redirect()->route('login');
        }
            
    }
}
