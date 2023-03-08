<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'descripcion' => 'Almacenamiento',
        ]);

        SubCategory::insert([
            'descripcion' => 'Pendrive',
            'categoria_id' => 1,
        ], [
            'descripcion' => 'Disco Rigido',
            'categoria_id' => 1
        ], [
            'descripcion' => 'Disco en estado solido',
            'categoria_id' => 1,
        ]);
    }
}
