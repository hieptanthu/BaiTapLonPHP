<?php

namespace App\Http\Middleware;

use App\Models\category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class SetGlobalCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $menu=category::all();

        // Đặt cookie
        Cookie::queue('menu', $menu, 60); // Thời gian sống của cookie là 60 phút
        return $next($request);
    }
}
