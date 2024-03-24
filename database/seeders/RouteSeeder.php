<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Permission;
use App\Models\PermissionRoute;
use Illuminate\Database\Seeder;
use App\Traits\RouteHelperTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RouteSeeder extends Seeder
{
    use RouteHelperTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getFilteredRoutes() as $route_name) {

            // dd($this->getFilteredRoutes());
            $route = Route::firstOrCreate(['name' => $route_name]);

            $permission = Permission::firstOrCreate(['name' => $route_name]);

            PermissionRoute::firstOrCreate(['route_id' => $route->id, 'permission_id' => $permission->id]);
        }
    }
}
