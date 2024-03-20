<?php

namespace App\Models;

use App\Models\Route;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRoute extends Model
{
    use HasFactory;

    protected $table = 'permission_route';

    protected $fillable = [
        'route_id',
        'permission_id',
    ];

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
