<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::getCart());
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $producto_id = $data['id_producto'];
        $cantidad = $data['cantidad'];
        
        $producto = Producto::find($producto_id);
        $cart = new Cart();

        $cart->producto_id = $producto->id;
        $cart->cantidad = $cantidad;
        $cart->user()->associate($request->user());
        
        $cart->add($producto, $cantidad);
        
        return response()->json($cart->cartItems);
    }
}
