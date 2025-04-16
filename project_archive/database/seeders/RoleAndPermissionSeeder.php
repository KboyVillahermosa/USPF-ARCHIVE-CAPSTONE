<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'view research']);
        Permission::create(['name' => 'edit research']);
        Permission::create(['name' => 'delete research']);
        Permission::create(['name' => 'approve research']);
        Permission::create(['name' => 'reject research']);
        Permission::create(['name' => 'generate reports']);

        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'research_ethics']);
        Role::create(['name' => 'research_coordinator']);
        Role::create(['name' => 'registrar']);
    }
}