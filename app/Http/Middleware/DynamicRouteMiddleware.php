<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $routeName = Route::currentRouteName();
        $arr = [];
        $all_routes = Route::getRoutes();
        foreach ($all_routes as $route) {
            $route_name = $route->getName();

                if(str_contains($route_name, 'debugbar.')){
                    continue;
                }else if(str_contains($route_name, 'sanctum.')){
                    continue;
                }else if(str_contains($route_name, 'ignition.')){
                    continue;
                }else if(!str_contains($route_name, '.')){
                    continue;
                }else if($route_name === null ){
                    continue;
                }

            array_push($arr,$route_name);
        }
        // dd($arr, $user->roles->first()->permissions);

        // Logic to determine the permission for this route
        $permissionName = 'access_' . $routeName;

        // Check if the permission already exists
        $permission = Permission::where('name', $permissionName)->first();

        // If the permission doesn't exist, create it
        if (!$permission) {
            $permission = Permission::create(['name' => $permissionName]);
        }

        // Assign the permission to the current user
        auth()->user()->givePermissionTo($permission);

        return $next($request);
    }
}
