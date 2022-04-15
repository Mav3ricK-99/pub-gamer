<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Almacenamiento',
        ]);

        DB::table('subcategorias')->insert([
            'nombre' => 'Pendrive',
            'categoria_id' => 1,
        ]);

        DB::table('subcategorias')->insert([
            'nombre' => 'Disco Rigido',
            'categoria_id' => 1,
        ]);

        DB::table('subcategorias')->insert([
            'nombre' => 'Disco en estado solido',
            'categoria_id' => 1,
        ]);
    }
}
