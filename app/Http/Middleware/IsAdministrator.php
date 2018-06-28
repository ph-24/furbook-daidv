<?php

namespace Furbook\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class IsAdministrator
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
        if(!Auth::user()->isAdministrator()){
            if($request->ajax()){
                return response('Forbidden', 403);
            }else{
                throw new AccessDeniedException('Forbiden');
            }
        }
        return $next($request);
    }
}
