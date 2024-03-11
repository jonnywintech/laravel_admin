<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\RoutePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private array $route_groups, $route_names;

    public function __construct()
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
            $this->route_names[] = $route_name;
            $this->route_groups[$route_prefix][] = $route_name;
        }
    }


    public function index()
    {
        $route_groups = $this->route_groups;
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateRouteNames()
    {

        foreach ($this->route_names as $route_name) {

            try {
                $permission = Permissions::create(['name' => $route_name]);
            } catch (\Throwable $th) {
                $permission = Permissions::where('name', $route_name)->first();
            }
            RoutePermission::create(['route_name' => $route_name,'permission_id'=> $permission->id]);
        }

        return redirect()->back()->with('success', 'Routes and permissions successfully created.');
    }
}
