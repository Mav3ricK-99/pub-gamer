<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'descripcion' => 'admin',
        ]);

        DB::table('roles')->insert([
            'descripcion' => 'user',
        ]);

        DB::table('permisos')->insert([
            'permiso' => 'ABMRoles',
        ]);

        DB::table('permisos')->insert([
            'permiso' => 'ABMPermisos',
        ]);

        DB::table('permisos')->insert([
            'permiso' => 'altaProducto',
        ]);

        DB::table('permisos')->insert([
            'permiso' => 'updateProducto',
        ]);

        DB::table('permisos')->insert([
            'permiso' => 'bajaProducto',
        ]);

        //permiso_role

        DB::table('permiso_role')->insert([
            'role_id' => '1',
            'permiso_id' => '1'
        ]);

        DB::table('permiso_role')->insert([
            'role_id' => '1',
            'permiso_id' => '2'
        ]);

        DB::table('permiso_role')->insert([
            'role_id' => '1',
            'permiso_id' => '3'
        ]);

        DB::table('permiso_role')->insert([
            'role_id' => '1',
            'permiso_id' => '4'
        ]);

        DB::table('permiso_role')->insert([
            'role_id' => '1',
            'permiso_id' => '5'
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1'
        ]);
    }
}
