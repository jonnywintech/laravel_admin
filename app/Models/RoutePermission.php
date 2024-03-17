<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class RoutePermission extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'permission_id'];

    public function route()
    {
        return $this->belongsToMany(Route::class,'route_id', 'id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_id','id');
    }

}
