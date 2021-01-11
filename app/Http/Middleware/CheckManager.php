<?php

namespace App\Http\Middleware;

use App\Models\UserLevel;
use Closure;

class CheckManager
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
        if($request->user()->user_level == UserLevel::NORMAL) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
