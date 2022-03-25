<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombreProducto' => '1',
            'stock' => '1',
            'precio' => '1',
            'categoria' => '1',
            'fabricante' => '1',
            'descripcion' => '1',
            'sku' => '1',
            'garantia' => '1'
        ]);

        DB::table('productos')->insert([
            'nombreProducto' => '2',
            'stock' => '2',
            'precio' => '2',
            'categoria' => '2',
            'fabricante' => '2',
            'descripcion' => '2',
            'sku' => '2',
            'garantia' => '2',
        ]);
    }
}
