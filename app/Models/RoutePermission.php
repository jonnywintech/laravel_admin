<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RoutePermission extends Model
{
    use HasFactory;

    protected $fillable = ['route_name', 'permission_id'];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'id', 'permission_id');
    }

}
