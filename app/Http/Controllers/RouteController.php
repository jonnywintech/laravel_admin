<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermissionRoute;
use App\Traits\RouteHelperTrait;
use App\Models\Route as RouteModel;


class RouteController extends Controller
{
    use RouteHelperTrait;

    public function __construct()
    {
        foreach ($this->getFilteredRoutes() as $route_name) {

            // dd($this->getFilteredRoutes());
            $route = RouteModel::firstOrCreate(['name' => $route_name]);

            $permission = Permission::firstOrCreate(['name' => $route_name]);

            PermissionRoute::firstOrCreate(['route_id' => $route->id, 'permission_id' => $permission->id]);

        }
    }
    public function index()
    {

        // $route_permissions = RouteModel::with('permissions')->get();

        // $route_groups = $this->getFilteredRoutes();

        $route_groups = [];

        $routes = RouteModel::all();

         foreach ($routes as $route) {

             if (!$route) {
                 continue;
             }

             if (!Str::contains($route->name, '.')) {
                 $title = 'User Created';
             } else {
                 $title = explode('.', $route->name)[0];
             }

             $route_groups[$title][] = $route;
         }


        return view('admin.route.index', compact('route_groups'));
    }

    public function store()
    {

    }


    public function update()
    {

    }
}
