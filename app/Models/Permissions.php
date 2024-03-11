<?php

namespace App\Models;

use App\Models\RoutePermission;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permissions extends SpatiePermission
{
    use HasFactory;


    public function routes()
    {
        return $this->hasMany(RoutePermission::class);
    }
}
