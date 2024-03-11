<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class DynamicRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Get the current route name
        $user = Auth::user();
        // if($user->hasRole('super-admin|admin')){
        //     return $next($request);
        // }
        $route_name = Route::currentRouteName();
        $route_permission_ids = DB::table('route_permissions')
        ->select('permission_id')
        ->where('route_name', $route_name)->get()
        ->pluck('permission_id')->toArray();


        if($user->hasAnyPermission($route_permission_ids)){
            return $next($request);
        }else{
            abort(403);
        }

    }
}
