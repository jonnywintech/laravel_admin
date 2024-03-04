<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $writer_role = Role::create(['name' => 'writer']);
        $writer_permission = Permission::create(['name' => 'writer can write text']);
        $writer_role->givePermissionTo($writer_permission);
        $writer_permission->assignRole($writer_role);


        $user_role = Role::create(['name' => 'user']);
        $user_permission = Permission::create(['name' => 'user can read text']);
        $user_role->givePermissionTo($user_permission);
        $user_permission->assignRole($user_role);



    }
}
