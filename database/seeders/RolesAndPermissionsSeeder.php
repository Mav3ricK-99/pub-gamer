<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit-products']);
        Permission::create(['name' => 'delete-products']);
        Permission::create(['name' => 'add-products']);

        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'add-post']);

        // this can be done as separate statements
        Role::create(['name' => 'user']);
            //->givePermissionTo(['publish articles', 'unpublish articles']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }
}
