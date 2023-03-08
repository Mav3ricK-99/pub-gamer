<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListadoProductosController extends Controller
{
    public function index()
    {
        $publicaciones = Post::paginate(20);
  
        return Inertia::render('ListadoProductos/ListadoProductos', [
            'publicaciones' => $publicaciones
        ]);
    }
}
