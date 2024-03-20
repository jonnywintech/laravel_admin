<?php

namespace App\Models;

use App\Models\Route;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends SpatiePermission
{
    use HasFactory;


    public function routes():BelongsToMany
    {
        return $this->belongsToMany(Route::class);
    }
}
