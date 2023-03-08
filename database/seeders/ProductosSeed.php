<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create([
            'nombre' => '1',
            'stock' => '1',
            'precio' => '1',
            'fabricante' => '1',
            'descripcion' => '1',
            'garantia' => '1',
            'sku' => '1',
            'categoria_id' => '1',
        ], [
            'nombre' => '2',
            'stock' => '2',
            'precio' => '2',
            'fabricante' => '2',
            'descripcion' => '2',
            'sku' => '2',
            'garantia' => '2',
            'categoria_id' => '2',
        ]);

        Product::first()->attachTag('250gb'); //Quitar..
    }
}
