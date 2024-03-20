<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route as MainRoute;

trait RouteHelperTrait
{

    // public function groupFilteredRoutes()
    // {
    //     $grouped_routes = [];

    //     $route_list = $this->getFilteredRoutes();

    //     $permissions = RoutePermission::with('route')->get();

    //      foreach ($permissions as $permission) {
    //          $route = $permission->route->first();

    //          if (!$route) {
    //              // If there's no associated route, handle it accordingly
    //              continue;
    //          }

    //          if (!Str::contains($route->name, '.')) {
    //              $title = 'User Created';
    //          } else {
    //              $title = explode('.', $route->name)[0];
    //          }

    //          $this->grouped_routes[$title][] = $permission;
    //      }

    // }

    public function getFilteredRoutes()
    {
        $routes = MainRoute::getRoutes();
        $filteredRoutes = [];

        foreach ($routes as $route) {
            $routeName = $route->getName();

            if ($this->shouldExcludeRoute($routeName)) {
                continue;
            }

            $filteredRoutes[] = $routeName;
        }

        return $filteredRoutes;
    }

    protected function shouldExcludeRoute($routeName)
    {
        $excludedPrefixes = ['debugbar.', 'sanctum.', 'ignition.'];

        if ($routeName === null || !str_contains($routeName, '.')) {
            return true;
        }

        foreach ($excludedPrefixes as $prefix) {
            if (str_starts_with($routeName, $prefix)) {
                return true;
            }
        }

        return false;
    }
}
