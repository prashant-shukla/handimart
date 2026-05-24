<?php

namespace App\Http\Middleware;

use Closure;
use App\WebLog;
class IpAddress
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
        WebLog::updateOrCreate(['visitor' => $request->ip()],
                                ['visitor' => $request->ip()]    
                                );
        return $next($request);
    }
}
