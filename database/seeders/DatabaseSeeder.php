<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserRolesSeed;
use Database\Seeders\UsersSeed;
use Database\Seeders\ProductosSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeed::class,
            RolesAndPermissionsSeeder::class,
            CategoriasSeeder::class,
            ProductosSeed::class,
            PublicacionesSeeder::class,
            ComentariosSeeder::class,
            RespuestasSeeder::class,
        ]);
    }
}
