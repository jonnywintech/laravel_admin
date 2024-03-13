<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoutesController;
use App\Http\Middleware\DynamicRouteMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', DynamicRouteMiddleware::class)->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/', AdminController::class);
    Route::resource('/role', RoleController::class);
    Route::post('/role/{role}/permissions', [RoleController::class, 'setPermissions'])->name('role.permissions');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'setRoles'])->name('permissions.role');
    Route::resource('/permission', PermissionController::class);
    Route::resource('/users', UserController::class);
    Route::patch('/users/{id}/update', [UserController::class, 'updateUserData'])->name('users.update.data');
    Route::get('/routes/generate', [RoutesController::class, 'generateRouteNames'])->name('routes.generate');
    Route::resource('/routes', RoutesController::class);
});

require __DIR__ . '/auth.php';
