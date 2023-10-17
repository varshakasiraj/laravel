<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role = Role::findByName('employee');
        // Role::create(['name' => 'manager']);
        // Role::create(['name' => 'supervisor']);
        // Role::create(['name' => 'employee']);
        //Permission::create(['name' => 'cmspage']);
        // Permission::create(['name' => 'studentDb']);
        //Permission::create(['name' => 'EmployeeDb']);
        // $role->givePermissionTo([
        //     'cmspage',
        //     'studentDb',
        //     'studentlogin',
        //     'EmployeeDb'
        // ]);
    }
}
