<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'user index',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'user create',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'user edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'user delete',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'role index',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'role create',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'role edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'role delete',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'permission index',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'permission create',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'permission edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'permission delete',
            'guard_name' => 'web'
        ]);
    }
}
