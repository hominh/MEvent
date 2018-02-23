<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next) {
         $roles = $this->getRequiredRoleForRoute($request->route());

         if($request->user()->hasRole($roles) || !$roles) {
             return $next($request);
         }

         return redirect()->route('nopermission');
     }

     public function getRequiredRoleForRoute($route) {
         $action = $route->getAction();
         return isset($action['roles']) ? $action['roles'] : null;
     }
}
