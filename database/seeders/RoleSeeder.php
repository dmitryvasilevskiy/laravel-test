<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::query()->firstOrCreate(['name' => 'manager', 'guard_name' => 'api']);
        Permission::query()->firstOrCreate(['name' => 'user.create','guard_name' => 'api']);
        $role->givePermissionTo('user.create');
        $role = Role::query()->firstOrCreate(['name' => 'employee', 'guard_name' => 'api']);
    }
}
