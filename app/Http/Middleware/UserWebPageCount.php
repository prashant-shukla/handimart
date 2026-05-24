<?php

namespace App\Http\Middleware;

use Closure;
use App\WebLog;
use Illuminate\Support\Facades\Auth;

class UserWebPageCount
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
          $url = \Route::current()->getName();
          $ipaddress = WebLog::firstWhere("visitor",$request->ip());
        if($url && $ipaddress){
            $ipaddress->increment('user_page_count');
            $ipaddress->refresh();
            if($ipaddress->user_page_count > 5 && !Auth::check()){
                return redirect()->route('login');
                
            }
        }
        return $next($request);
    }
}
