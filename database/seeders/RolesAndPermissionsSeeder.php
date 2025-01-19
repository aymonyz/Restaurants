<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // إنشاء الصلاحيات
        $permissions = [
            'add-employees',
            'edit-employees',
            'delete-employees',
            'add-companies',
            'edit-companies',
            'delete-companies',
            'add-department',
            'edit-department',
            'delete-department',
            'assign-general-task',
            'assign-department-task',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // إنشاء الأدوار وربط الصلاحيات
        $adminRole = Role::create(['name' => 'main-admin']);
        $adminRole->givePermissionTo($permissions);

        $managerRole = Role::create(['name' => 'company-manager']);
        $managerRole->givePermissionTo(['add-employees', 'edit-employees', 'assign-department-task']);
        
        $managerRole = Role::create(['name' => 'company-manager']);
        $managerRole->givePermissionTo(['add-employees', 'edit-employees', 'assign-department-task']);

        $departmentHeadRole = Role::create(['name' => 'department-head']);
        $departmentHeadRole->givePermissionTo(['assign-department-task']); // بدون صلاحيات
    
    }
}
