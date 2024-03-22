<?php

namespace App\Console\Commands;

use App\Models\Route;
use App\Models\Permission;
use App\Models\PermissionRoute;
use Illuminate\Console\Command;
use App\Traits\RouteHelperTrait;

class GenerateBaseRoutePermissions extends Command
{
    use RouteHelperTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-base-route-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate base routes and permissions';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->getFilteredRoutes() as $route_name) {

            // dd($this->getFilteredRoutes());
            $route = Route::firstOrCreate(['name' => $route_name]);

            $permission = Permission::firstOrCreate(['name' => $route_name]);

            PermissionRoute::firstOrCreate(['route_id' => $route->id, 'permission_id' => $permission->id]);

        }
    }
}
