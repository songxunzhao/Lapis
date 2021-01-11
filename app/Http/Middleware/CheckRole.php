<?php

namespace App\Http\Middleware;

use App\Models\UserLevel;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param UserLevel $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user()->user_level != $role) {
            return redirect('home');
        }
        return $next($request);
    }
}
