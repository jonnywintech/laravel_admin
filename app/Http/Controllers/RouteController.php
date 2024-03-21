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

    // constructor generates new routes if they are created
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


    public function update(Request $request)
    {
        // dd($request);
        if(isset($request->delete_permission)){
            $permissions = Permission::whereIn('name', $request->delete_permission);
            $permissions->delete();
        }

        if(isset($request->permission)){
            $permission = Permission::firstOrCreate(['name' => $request->permission]);
            $route = RouteModel::where('name', $request->route_name)->first();

            $route->permissions()->attach($permission);
        }

        return redirect()->back();
    }
}
