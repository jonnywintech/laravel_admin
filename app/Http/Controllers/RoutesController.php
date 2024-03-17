<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use App\Models\RoutePermission;
use App\Models\Route as RouteModel;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\RoutesPermissionUpdateRequest;
use Illuminate\Support\Str;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private array $grouped_routes = [];

     public function __construct()
     {
         $permissions = RoutePermission::with('route')->get();

         foreach ($permissions as $permission) {
             $route = $permission->route->first();

             if (!$route) {
                 // If there's no associated route, handle it accordingly
                 continue;
             }

             if (!Str::contains($route->name, '.')) {
                 $title = 'User Created';
             } else {
                 $title = explode('.', $route->name)[0];
             }

             $this->grouped_routes[$title][] = $permission;
         }
     }


    public function index()
    {
        $route_groups = $this->grouped_routes;
        if (count($route_groups) === 0) {
            $this->store();
        }

        return view('admin.routes.index', compact('route_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $all_routes = Route::getRoutes();
        foreach ($all_routes as $route) {
            $route_name = $route->getName();

            if (str_contains($route_name, 'debugbar.')) {
                continue;
            } else if (str_contains($route_name, 'sanctum.')) {
                continue;
            } else if (str_contains($route_name, 'ignition.')) {
                continue;
            } else if (!str_contains($route_name, '.')) {
                continue;
            } else if ($route_name === null) {
                continue;
            }
            $route_prefix = explode('.', $route_name)[0];
            $route_names[] = $route_name;
            $route_groups[$route_prefix][] = $route_name;
        }

        foreach ($route_names as $route_name) {


            $route = RouteModel::firstOrCreate(['name' => $route_name]);

            $permission = Permissions::firstOrCreate(['name' => $route_name]);

            try {
                RoutePermission::create(['route_id' => $route->id, 'permission_id' => $permission->id]);
            } catch (\Throwable $th) {
                //throw $th;
            }
            // $route->permissions()->syncWithoutDetaching([$permission->id]);

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoutesPermissionUpdateRequest $request, RoutePermission $route)
    {
        $data = $request->validated();
        dd($data, $route);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
