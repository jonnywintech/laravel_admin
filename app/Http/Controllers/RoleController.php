<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();

        Role::create($data);

        return to_route('admin.role.index');
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
    public function edit(Role $role)
    {

        $permissions = Permission::all();
        $permissions_grouped = [];
        foreach( $permissions as $permission){
            if(!str_contains($permission->name, '.')){
                $title = 'User Created';
                $permissions_grouped[$title][] = $permission;
                continue;
            }
            $title = explode('.',$permission->name)[0];

            $permissions_grouped[$title][] = $permission;
        }

        return view('admin.role.edit', compact('role', 'permissions_grouped'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();

        $role->update($data);

        return to_route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return to_route('admin.role.index');
    }

    public function setPermissions(Request $request, Role $role)
    {

        $data = $request->permission;

        $role->syncPermissions($data);

        return redirect()->back();
    }
}
