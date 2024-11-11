<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class testAdmin
{
    public function handle(Request $request, Closure $next): Response {
        if($request->email == "admin123@gmail.com" || $request->password == "admin123"){
            return $next($request);
        }

        return redirect("/login");
    }
}
